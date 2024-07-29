<?php

namespace App\Modules\Employee\Interfaces;

use App\Models\Employee;

interface EmployeeInterface
{
    public function save($request): Employee;
    public function generateCode(): string;

}
