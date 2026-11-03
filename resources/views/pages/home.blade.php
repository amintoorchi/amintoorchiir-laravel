<div class="mx-auto max-w-5xl space-y-10">

    <header class="space-y-2">
        <h1 class="text-2xl font-bold text-[var(--gruvbox-fg)]">
            Latest Articles
        </h1>

        <p class="text-sm text-[var(--gruvbox-fg-muted)]">
            Thoughts, tutorials, and things I've learned along the way.
        </p>
    </header>

    <section class="space-y-6">
        @forelse ($blogs as $blog)
            <article wire:key="blog-{{ $blog->id }}" class="group border-b border-[var(--gruvbox-border)] pb-6">
                <div class="flex flex-col gap-4 sm:flex-row">

                    @if ($blog->thumbnail)
                        <a href="{{ route('blogs.show', $blog) }}" class="shrink-0" wire:navigate>
                            <img src="{{ Storage::disk('public')->url($blog->thumbnail) }}"
                                alt="{{ $blog->thumbnail_alt ?: $blog->title }}"
                                class="aspect-video w-full rounded-xs object-cover sm:size-36" loading="lazy">
                        </a>
                    @endif

                    <div class="min-w-0 flex-1 space-y-3">

                        <div class="flex flex-wrap items-center gap-3 text-xs text-[var(--gruvbox-fg-muted)]">
                            @if ($blog->created_at)
                                <time datetime="{{ $blog->created_at->toISOString() }}">
                                    {{ $blog->created_at->format('M d, Y') }}
                                </time>
                            @endif

                            @if ($blog->reading_time_minutes)
                                <span>
                                    {{ $blog->reading_time_minutes }} min read
                                </span>
                            @endif

                            @if ($blog->is_featured)
                                <span class="rounded-full bg-[var(--gruvbox-yellow)]/15 px-2 py-1 text-[var(--gruvbox-yellow)]">
                                    Featured
                                </span>
                            @endif
                        </div>

                        <h2 class="text-lg font-semibold">
                            <a href="{{ route('blogs.show', $blog) }}"
                                wire:navigate
                                class="text-[var(--gruvbox-fg)] transition-colors hover:text-[var(--gruvbox-yellow)]">
                                {{ $blog->title }}
                            </a>
                        </h2>

                        @if ($blog->subtitle)
                            <p class="text-sm text-[var(--gruvbox-fg-muted)]">
                                {{ $blog->subtitle }}
                            </p>
                        @endif

                        @if ($blog->excerpt)
                            <p class="line-clamp-2 text-sm leading-7 text-[var(--gruvbox-fg-muted)]">
                                {{ $blog->excerpt }}
                            </p>
                        @endif

                        <div class="flex items-center justify-between gap-4">
                            @if ($blog->author)
                                <span class="text-xs text-[var(--gruvbox-fg-muted)]">
                                    {{ $blog->author->name }}
                                </span>
                            @endif

                            <a href="{{ route('blogs.show', $blog) }}"
                                wire:navigate
                                class="inline-flex items-center gap-2 text-sm font-medium text-[var(--gruvbox-yellow)] transition-all group-hover:gap-3">
                                Read Article
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>

                    </div>
                </div>
            </article>
        @empty
            <div class="rounded-xl  px-6 py-16 text-center">
                <h2 class="text-lg font-semibold text-[var(--gruvbox-fg)]">
                    No articles yet
                </h2>

                <p class="mt-2 text-sm text-[var(--gruvbox-fg-muted)]">
                    New articles will appear here soon.
                </p>
            </div>
        @endforelse
    </section>

</div>  