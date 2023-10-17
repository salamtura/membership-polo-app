<?php

namespace App\Http\Livewire;


use App\Models\Membership;
use App\Models\MemberAccess;
use App\Models\MembershipCategory;
use App\Models\Occupation;
use App\Models\Profession;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use function PHPUnit\Framework\isEmpty;

class Wizard extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    #[Rule('image|max:1024')] // 1MB Max
    public $photo;
    public $surname, $first_name,$middle_name,$email,$mobile,$alt_mobile,$address,$date_of_birth,
            $gender, $nationality,$occupation,$profession,$name_of_organization,$type_of_organization,
        $category, $area_of_interest, $other_membership, $other_club, $involved_in_polo, $horse_owner,
        $number_of_horses,$blood_group,$genotype,$office_address,$emergency_contact_name,$emergency_contact_mobile,
        $emergency_contact_relationship;
    public $successMessage = '';

    public $membershipCategories,$occupations,$professions;

    public function render()
    {
        if(Auth::check()){
            $membership = Membership::query()->where('user_id','=',Auth::id());
            if($membership->first()){
                if(!Auth::user()->hasPermissionTo('view.member')){
                    return abort(403);
                }
                return view('livewire.enrolled');
            }
            return view('livewire.wizard');
        }
        return abort(403);
    }

    public function mount(){
        $this->email = Auth::user()->email;
        $this->mobile = Auth::user()->mobile;

        $this->membershipCategories = MembershipCategory::orderby('name','asc')
            ->select('*')
            ->get();

        $this->professions = Profession::orderby('name','asc')
            ->select('*')
            ->get();

        $this->occupations = Occupation::orderby('name','asc')
            ->select('*')
            ->get();
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'surname' => 'required',
            'first_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
//            'alt_mobile' => 'numeric',
            'address' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'blood_group' => 'required',
            'genotype' => 'required',
            'photo' => 'required|image|max:2048'
        ]);

        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'occupation' => 'required',
            'profession' => 'required',
            'name_of_organization' => 'required',
            'type_of_organization' => 'required',
            'office_address' => 'required',
        ]);

        $this->currentStep = 3;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'category' => 'required',
            'area_of_interest' => 'required',
            'name_of_organization' => 'required',
            'other_membership' => 'required',
            'other_club' => '',
            'involved_in_polo' => 'required',
            'horse_owner' => 'required',
            'number_of_horses' => 'required|numeric',

        ]);

        $this->currentStep = 4;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {

        $validatedData = $this->validate([
            'emergency_contact_name' => 'required',
            'emergency_contact_mobile' => 'required|numeric',
            'emergency_contact_relationship' => 'required',
        ]);

        $name = md5($this->photo . microtime()).'.'.$this->photo->extension();

        $this->photo->storeAs('public', $name);


        Membership::create([
            'user_id' => Auth::id(),
            'surname' => $this->surname,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'address' => $this->address,
            'gender' => $this->gender,
            'mobile' => $this->mobile,
            'alt_mobile' => $this->alt_mobile,
            'email' => $this->email,
            'occupation_id' => $this->occupation,
            'profession_id' => $this->profession,
            'name_of_organization' => $this->name_of_organization,
            'type_of_organization' => $this->type_of_organization,
            'nationality' => $this->nationality,
            'date_of_birth' => $this->date_of_birth,
            'membership_category_id' => $this->category,
            'area_of_interest' => $this->area_of_interest,
            'other_membership' => $this->other_membership,
            'other_club' => $this->other_club,
            'involved_in_polo' => $this->involved_in_polo,
            'horse_owner' => $this->horse_owner,
            'number_of_horses' => $this->number_of_horses,
            'blood_group' => $this->blood_group,
            'genotype' => $this->genotype,
            'office_address' => $this->office_address,
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_mobile' => $this->emergency_contact_mobile,
            'emergency_contact_relationship' => $this->emergency_contact_relationship,
            'profile_photo' => $name,

        ]);

        $access = MemberAccess::all()->where('mobile','=',Auth::user()->mobile)->first();
        $access->status = 'enrolled';
        $access->save();

        $this->successMessage = 'Membership Enrolled Successfully. Kindly wait for information validation from management';

        $this->clearForm();

        $this->currentStep = 1;

//        return view('livewire.enrolled');



    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
//        $this->name = '';
//        $this->amount = '';
//        $this->description = '';
//        $this->stock = '';
//        $this->status = 1;
    }

    public function returnHome(){
        return redirect('/');
    }
}
