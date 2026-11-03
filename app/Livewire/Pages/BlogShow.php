<?php

namespace App\Livewire\Pages;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts::layouts.main')]
class BlogShow extends Component
{
    public Blog $blog;

    public function mount(): void
    {
        abort_unless($this->blog->is_published, 404);
    }

    public function render()
    {
        return view('pages.blog-show')
            ->title($this->blog->seo_title ?: $this->blog->title);
    }
}
