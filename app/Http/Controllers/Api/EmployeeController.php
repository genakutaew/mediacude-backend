<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::with(['departments'])->get();
        return response()->json([
            'employees' => $employee
        ]);
    }

    public function store(CreateEmployeeRequest $request)
    {
        $employee = Employee::create($request->toArray());
        $employee->department()->attach($request->input('department_id'));

        return response()->json([
            'status' => true,
            'employee' => $employee
        ]);
    }

    public function update(Employee $employee, UpdateEmployeeRequest $request)
    {
        $employee->update($request->toArray());
        $employee->department()->detach()->attach($request->input('department_id'));
        return response()->json([
            'status' => true,
            'employee' => $employee
        ]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'status' => true
        ]);
    }
}
