<?php

namespace App\Modules\Employee\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Employee\Http\Requests\CreateEmployeeRequest;
use App\Modules\Employee\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    private $repository;

    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(CreateEmployeeRequest $request)
    {
        DB::beginTransaction();
        $employee = $this->repository->save($request);
        DB::commit();

        return response()->json([
            'status'  => true,
            'data'    => [
                'employee' => $employee,
            ],
            'message' => 'Successfully saved',
        ], 200);
    }
}
