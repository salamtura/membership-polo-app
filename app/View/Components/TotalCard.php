<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TotalCard extends Component
{
    public $name;
    public $icon;
    public $value;
    public $status;
    /**
     * Create a new component instance.
     */
    public function __construct($name = '', $icon = '', $value = 0, $status = '')
    {
        //
        $this->name = $name;
        $this->icon = $icon;
        $this->value = $value;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.total-card');
    }
}
