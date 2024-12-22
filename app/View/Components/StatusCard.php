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
    public $icon;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $description = '', $status = '', $date = '', $icon = '')
    {
        //
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->date = $date;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.status-card');
    }
}
