<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts::layouts.main')]
#[Title('صفحه اصلی')]
class Home extends Component
{
    public function render()
    {
        return view('pages.home');
    }
}
