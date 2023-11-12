<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\TotalEnrolled;
use App\Nova\Metrics\TotalMembers;
use App\Nova\Metrics\TotalStableAllocation;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new TotalMembers(),
            new TotalStableAllocation(),
            new TotalEnrolled(),
        ];
    }
}
