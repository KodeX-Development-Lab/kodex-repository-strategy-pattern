<?php

namespace App\Modules\LeaveApplication\Repositories;

use App\Models\Employee;
use App\Modules\LeaveApplication\Interfaces\LeaveApplicationInterface;
use Carbon\Carbon;

class MalaysiaLeaveApplicationRepository implements LeaveApplicationInterface
{

    public function getLeaveAllowance(Employee $employee): float
    {
        $years = Carbon::parse($employee->joined_date)->diffInYears(Carbon::now());

        $total_allowance = 0;

        if ($years <= 2) {
            $total_allowance = 12;
        } elseif ($years > 2) {
            $total_allowance = 16;
        }

        return $total_allowance;
    }
}
