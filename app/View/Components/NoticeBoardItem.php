<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NoticeBoardItem extends Component
{

    public $datelabel, $day, $title, $description, $players, $breakoutSessions, $time, $noticeID;

    public function __construct($datelabel, $day, $title, $description, $players, $breakoutSessions, $time, $noticeID)
    {
        $this->datelabel = $datelabel;
        $this->day = $day;
        $this->title = $title;
        $this->description = $description;
        $this->players = $players;
        $this->breakoutSessions = $breakoutSessions;
        $this->time = $time;
        $this->noticeID = $noticeID;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notice-board-item');
    }
}
