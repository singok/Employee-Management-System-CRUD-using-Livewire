<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\AddEmployee;
use App\Http\Livewire\ShowEmployee;
use App\Http\Livewire\Dashboard;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class)->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/add-employee', AddEmployee::class)->name('add.employee');

Route::get('/show-employee', ShowEmployee::class)->name('show.employee');