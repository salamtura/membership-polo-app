<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CancelBooking extends Component
{
    public $booking;

    public function render()
    {
        return view('livewire.cancel-booking');
    }

    public function cancelBooking(){

        $b = \App\Models\ChukkerBooking::find($this->booking->id);
        $b->delete();

        redirect('/dashboard');
    }
}
