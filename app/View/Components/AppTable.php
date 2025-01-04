<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $headerFields;
    public function __construct($headerFields = [])
    {
        $this->headerFields = $headerFields;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app-table');
    }
}
