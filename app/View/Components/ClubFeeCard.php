<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClubFeeCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $name, $price;
    public function __construct($name,  $price)
    {
        $this->name = $name;
        $this->price = $price;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.club-fee-card');
    }
}
