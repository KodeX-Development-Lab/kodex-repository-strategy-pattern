<?php

namespace App\Modules\LeaveApplication\Repositories;

use App\Models\Employee;
use App\Modules\LeaveApplication\Interfaces\LeaveApplicationInterface;

class MyanmarLeaveApplicationRepository implements LeaveApplicationInterface
{
    public function getLeaveAllowance(Employee $employee) : float
    {
        return 7;
    }
}
