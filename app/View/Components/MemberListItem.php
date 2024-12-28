<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MemberListItem extends Component
{
    public $image, $name, $email, $points;
    public function __construct($image = '', $name = '', $email = '', $points = '')
    {
        $this->image = $image;
        $this->name = $name;
        $this->email = $email;
        $this->points = $points;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.member-list-item');
    }
}
