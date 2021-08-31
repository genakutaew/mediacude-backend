<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\EmployeeRequest;
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

    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->toArray());
        $employee->departments()->attach($request->input('departments_ids'));
        $employee->load(['departments']);
        return response()->json([
            'status' => true,
            'employee' => $employee
        ]);
    }

    public function update(Employee $employee, EmployeeRequest $request)
    {
        $employee->update($request->toArray());
        $employee->departments()->sync($request->input('departments_ids'));
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
