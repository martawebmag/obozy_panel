<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:admin'])
    ->get('/admin/dashboard', fn() => view('admin.dashboard'))
    ->name('admin.dashboard');

