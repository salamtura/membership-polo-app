<?php

namespace App\Http\Livewire;

use App\Http\Helpers\SMSUtil;
use App\Models\MemberAccess;
use App\Models\MembershipCategory;
use App\Models\Occupation;
use App\Models\Profession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Enrolment extends Component
{
    public $showresult = false;
    public $showcode = false;
    public $search = "";
    public $records;
    public $memberAccess;
    public $code = "";

    // Fetch records
    public function searchResult(){

        if(!empty($this->search)){

            $this->records = MemberAccess::orderby('name','asc')
                ->select('*')
                ->where('name','like','%'.$this->search.'%')
                ->limit(5)
                ->get();

            $this->showresult = true;
        }else{
            $this->showresult = false;
        }
    }

    // Fetch record by ID
    public function fetchMemberDetail($id = 0){

        $record = MemberAccess::select('*')
            ->where('id',$id)
            ->first();

        $this->search = $record->name;
        $this->memberAccess = $record;
        $this->showresult = false;
    }

    public function sendAccessCode($id = 0){
        $access = MemberAccess::all()->where('id','=',$id)->first();

        $message = 'Guards Polo Club \n Your access code is '.$access->access_code;
        $recipients = $this->replaceLeadingZero($access->mobile);

        if(env('APP_ENV') != 'local'){
            $response = SMSUtil::sendSMS($message, $recipients);
        }

        if(env('APP_ENV') == 'local' || $response['status'] == "ok"){
            $this->showresult = false;
            $this->showcode = true;
        }else{
            $this->code = "";
            $this->validate([
                'code' => 'required',
            ],
                [
                    'code.required' => 'Unable to send access code at the moment. Please try again.',
                ]);
        }


    }

    function replaceLeadingZero($string) :string
    {
        if (strpos($string, '0') === 0) {
            $string = '234' . substr($string, 1);
        }

        return $string;
    }

    public function giveAccess($id = 0){
        $validatedData = $this->validate([
            'code' => 'required',
        ]);

        $access = MemberAccess::all()->where('id','=',$id)->first();

        if($this->code == $access->access_code){
            if(Auth::check()){
                if(!Auth::user()->hasPermissionTo('view.member')){
                    Auth::logout();
                }
            }
            $token = Crypt::encryptString($id);

            return redirect()->intended('register/'.$token);
        }

        $this->code = "";
        $this->validate([
            'code' => 'required',
        ],
        [
            'code.required' => 'The code provided does not match.',
        ]);

    }



    public function render()
    {
        return view('livewire.enrolment');
    }
}
