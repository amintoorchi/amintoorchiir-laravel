<?php

use App\Livewire\Pages\BlogShow;
use App\Livewire\Pages\Home;
use Illuminate\Support\Facades\Route;

Route::livewire('/', Home::class)->name('home');
Route::livewire('/blogs/{blog}', BlogShow::class)->name('blogs.show');
Route::get('blogs', function () {
    return redirect()->route('home');
})->name('blog');
