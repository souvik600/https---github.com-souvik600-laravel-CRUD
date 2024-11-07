<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Define resource routes for EmployeeController
Route::resource('employees', EmployeeController::class);

// Optional: Define the root route to redirect to employees index
Route::get('/', function () {
    return redirect()->route('employees.index');
});
