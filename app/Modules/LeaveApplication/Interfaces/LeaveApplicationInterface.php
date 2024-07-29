<?php

namespace App\Modules\LeaveApplication\Interfaces;

use App\Models\Employee;

interface LeaveApplicationInterface {
    public function getLeaveAllowance(Employee $employee): float;
}