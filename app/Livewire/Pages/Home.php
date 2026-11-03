<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts::layouts.main')]
#[Title('صفحه اصلی')]
class Home extends Component
{
    public function render()
    {
        return view('pages.home');
    }
}
