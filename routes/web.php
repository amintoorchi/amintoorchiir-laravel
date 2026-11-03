<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Home;



Route::livewire('/', Home::class)->name('home');