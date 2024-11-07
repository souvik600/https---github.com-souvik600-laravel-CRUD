<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Define fillable attributes to allow mass assignment
    protected $fillable = [
        'employee_name',
        'position',
        'salary',
        'hire_date',
    ];
}
