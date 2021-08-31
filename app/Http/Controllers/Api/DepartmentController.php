<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return response()->json([
            'departments' => $departments
        ]);
    }

    public function store(DepartmentRequest $request)
    {
        $department = Department::create($request->toArray());
        return response()->json([
            'status' => true,
            'department' => $department
        ]);
    }

    public function update(Department $department, DepartmentRequest $request)
    {
        $department->update($request->toArray());
        return response()->json([
            'status' => true,
            'department' => $department
        ]);
    }

    public function destroy(Department $department)
    {
        if ($department->employees_count) {
            return response()->json([
                'status' => false
            ]);
        }
        $department->delete();
        return response()->json([
            'status' => true
        ]);
    }
}
