<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MemberCard extends Component
{

    public $photo, $name, $handicap;

    public function __construct($photo, $name, $handicap)
    {
        $this->photo = $photo;
        $this->name = $name;
        $this->handicap = $handicap;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.member-card');
    }
}
