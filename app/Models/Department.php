<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'employees_count',
        'max_salary'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function getEmployeesCountAttribute()
    {
        return $this->employees()->exists() ? $this->employees->count() : 0;
    }

    public function getMaxSalaryAttribute()
    {
        return $this->employees()->exists() ? $this->employees->max('salary') : 0;
    }
}
