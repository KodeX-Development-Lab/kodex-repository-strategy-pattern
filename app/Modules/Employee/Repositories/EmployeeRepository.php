<?php

namespace App\Modules\Employee\Repositories;

use App\Models\Country;
use App\Models\Employee;
use App\Models\LeaveAllowance;
use App\Modules\Employee\Interfaces\EmployeeInterface;
use App\Modules\LeaveApplication\Repositories\MalaysiaLeaveApplicationRepository;
use App\Modules\LeaveApplication\Repositories\MyanmarLeaveApplicationRepository;
use Illuminate\Support\Facades\DB;

class EmployeeRepository implements EmployeeInterface
{
    const MYANMAR_COUNRY_CODE  = 'MM';
    const MALAYSIA_COUNRY_CODE = 'MY';
    private $leave_application;

    public function save($request): Employee
    {
        $employee = Employee::create([
            'code'           => $this->generateCode(),
            'name'           => $request->name,
            'preferred_name' => $request->preferred_name,
            'email'          => $request->email,
            'joined_date'    => $request->joined_date,
            'country_id'     => $request->employee_id,
        ]);

        return $employee;
    }

    public function saveLeaveAllowance($employee)
    {
        $country = Country::findOrFail($employee->country_id);

        if ($country->code == self::MALAYSIA_COUNRY_CODE) {
            $this->leave_application = new MalaysiaLeaveApplicationRepository();
        } else {
            $this->leave_application = new MyanmarLeaveApplicationRepository();
        }

        $allowance = LeaveAllowance::create([
            'employee_id' => $employee->id,
            'allowance'   => $this->leave_application->getLeaveAllowance($employee),
        ]);

        return $allowance;
    }

    public function generateCode(): string
    {
        $id   = DB::table('employees')->latest('id')->first()->id ?? 0;
        $code = "Employee-" . str_pad(++$id, 5, 0, STR_PAD_LEFT);

        return $code;
    }
}
