<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'salary'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }
}
