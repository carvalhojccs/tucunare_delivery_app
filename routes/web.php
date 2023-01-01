<?php

use App\Http\Livewire\Plans;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('plans',Plans\Index::class)->name('plans.index');