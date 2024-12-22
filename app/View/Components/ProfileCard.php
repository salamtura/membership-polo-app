<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileCard extends Component
{
    public $image;
    public $name;
    public $year;
    public $status;

    public function __construct($image = '', $name = '', $year = '', $status = '')
    {
        $this->image = $image;
        $this->name = $name;
        $this->year = $year;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile-card');
    }
}