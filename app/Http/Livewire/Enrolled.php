<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Enrolled extends Component
{
    public function render()
    {
        return view('livewire.enrolled');
    }

    public function returnHome(){
        return redirect('/');
    }
}
