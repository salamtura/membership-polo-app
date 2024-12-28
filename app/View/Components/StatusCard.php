<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusCard extends Component
{
    public $title;
    public $description;
    public $status;
    public $date;
    public $icon, $countdown, $chukker, $booking;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $description = '', $status = '', $date = '', $icon = '', $countdown = '', $chukker, $booking)
    {
        //
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->date = $date;
        $this->icon = $icon;
        $this->countdown = $countdown;
        $this->chukker = $chukker;
        $this->booking = $booking;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.status-card');
    }
}
