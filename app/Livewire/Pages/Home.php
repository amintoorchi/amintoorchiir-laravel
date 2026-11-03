<?php

namespace App\Livewire\Pages;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts::layouts.main')]
#[Title('Home')]
class Home extends Component
{
    public function render()
    {
        return view('pages.home', [
            'blogs' => Blog::query()
                ->published()
                ->with('author')
                ->latest()
                ->limit(10)
                ->get(),
        ]);
    }
}
