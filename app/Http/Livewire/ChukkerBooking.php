<?php

namespace App\Http\Livewire;

use App\Models\Chukker;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChukkerBooking extends Component
{
    public $display = 'none';
    public $chukker,$booking;
    public $chukker_id ,$chukkerno, $mounts,$preference;
    public function render()
    {
        $this->chukker = Chukker::query()->orderByDesc('id')->first();
        $this->booking = \App\Models\ChukkerBooking::query()
            ->where('chukker_id','=',$this->chukker->id)
            ->where('membership_id','=',Auth::user()->membership->id)
            ->first();
        return view('livewire.chukker-booking',[
            'chukker' => $this->chukker,
        ]);
    }

    public function book()
    {
        if ($this->booking == null) {
            $booking = \App\Models\ChukkerBooking::create([
                'membership_id' => Auth::user()->membership->id,
                'chukker_id' => $this->chukker->id,
                'chukker_number' => $this->chukkerno,
                'mounts' => $this->mounts,
                'status' => 'booked',
                'preference' => $this->preference,
            ]);

            $this->booking = $booking;

            $this->clearForm();

            $this->display = 'none';

            redirect('/dashboard');
        }


    }

    public function clearForm()
    {
        $this->chukker_id = '';
        $this->chukkerno = '';
        $this->mounts = '';
        $this->preference = '';
    }
}
