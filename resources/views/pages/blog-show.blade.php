<div class="mx-auto max-w-7xl space-y-12">

    {{-- Breadcrumb --}}
    <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-sm text-[var(--gruvbox-fg-muted)]">
        <a href="{{ route('home') }}" class="transition-colors hover:text-[var(--gruvbox-yellow)]">
            Home
        </a>

        <span aria-hidden="true">/</span>

        <a href="{{ route('home') }}" class="transition-colors hover:text-[var(--gruvbox-yellow)]">
            Articles
        </a>

        <span aria-hidden="true">/</span>

        <span class="truncate text-[var(--gruvbox-fg)]">
            {{ $blog->title }}
        </span>
    </nav>

    {{-- Article Header --}}
    <header class="space-y-6">

        {{-- Article Meta --}}
        <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-[var(--gruvbox-fg-muted)]">

            @if ($blog->published_at)
                <time datetime="{{ $blog->created_at->toISOString() }}">
                    {{ $blog->created_at->format('M d, Y') }}
                </time>
            @endif

            @if ($blog->reading_time_minutes)
                <span>{{ $blog->reading_time_minutes }} min read</span>
            @endif

            @if ($blog->word_count)
                <span>{{ number_format($blog->word_count) }} words</span>
            @endif

            @if ($blog->is_featured)
                <span class="rounded-full bg-[var(--gruvbox-yellow)]/15 px-3 py-1 font-medium text-[var(--gruvbox-yellow)]">
                    Featured
                </span>
            @endif

        </div>

        {{-- Title --}}
        <div class="max-w-7xl space-y-4">

            <h1
                class="text-3xl leading-tight font-bold tracking-tight text-[var(--gruvbox-fg)] sm:text-4xl md:text-5xl">
                {{ $blog->title }}
            </h1>

            @if ($blog->subtitle)
                <p class="max-w-3xl text-base leading-8 text-[var(--gruvbox-fg-muted)] sm:text-lg">
                    {{ $blog->subtitle }}
                </p>
            @endif

        </div>

        {{-- Author & Article Information --}}
        <div
            class="flex flex-col gap-5 border-y border-[var(--gruvbox-border)] py-5 sm:flex-row sm:items-center sm:justify-between">

            {{-- Author --}}
            <div class="flex items-center gap-3">
                <div
                    class="flex size-11 shrink-0 items-center justify-center rounded-full bg-[var(--gruvbox-bg-soft)] text-base font-bold text-[var(--gruvbox-yellow)]">
                    {{ mb_substr($blog->author?->name ?? 'A', 0, 1) }}
                </div>

                <div class="space-y-1">
                    <p class="text-sm font-semibold text-[var(--gruvbox-fg)]">
                        {{ $blog->author?->name ?? 'Anonymous' }}
                    </p>

                    <p class="text-xs text-[var(--gruvbox-fg-muted)]">
                        Author
                    </p>
                </div>
            </div>

            {{-- Article Information --}}
            <div class="flex flex-wrap items-center gap-x-5 gap-y-3 text-xs">

                @if ($blog->created_at)
                    <div class="flex items-center gap-2 text-[var(--gruvbox-fg-muted)]">
                        <span class="text-[var(--gruvbox-yellow)]">Published</span>
                        <time datetime="{{ $blog->created_at->toISOString() }}">
                            {{ $blog->created_at->format('M d, Y') }}
                        </time>
                    </div>
                @endif

                @if ($blog->reading_time_minutes)
                    <div class="flex items-center gap-2 text-[var(--gruvbox-fg-muted)]">
                        <span class="text-[var(--gruvbox-yellow)]">Reading time</span>
                        <span>{{ $blog->reading_time_minutes }} min</span>
                    </div>
                @endif

                @if ($blog->word_count)
                    <div class="flex items-center gap-2 text-[var(--gruvbox-fg-muted)]">
                        <span class="text-[var(--gruvbox-yellow)]">Words</span>
                        <span>{{ number_format($blog->word_count) }}</span>
                    </div>
                @endif

                <div class="flex items-center gap-2 text-[var(--gruvbox-fg-muted)]">
                    <span class="text-[var(--gruvbox-yellow)]">Language</span>
                    <span>{{ strtoupper(substr($blog->locale, 0, 2)) }}</span>
                </div>

            </div>

        </div>

    </header>

    {{-- Featured Image --}}
    @if ($blog->thumbnail)
        <figure class="space-y-3">

            <img src="{{ Storage::disk('public')->url($blog->thumbnail) }}" alt="{{ $blog->thumbnail_alt ?: $blog->title }}"
                class="aspect-video w-full rounded-xl border border-[var(--gruvbox-border)] object-cover"
                fetchpriority="high">

            @if ($blog->thumbnail_caption)
                <figcaption class="text-center text-xs text-[var(--gruvbox-fg-muted)]">
                    {{ $blog->thumbnail_caption }}
                </figcaption>
            @endif

        </figure>
    @endif

    {{-- Article Layout --}}
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-[minmax(0,1fr)_0px]">

        {{-- Main Content --}}
        <main class="min-w-0">

            @if ($blog->excerpt)
                <div
                    class="mb-10 rounded-lg border-s-2 border-[var(--gruvbox-yellow)] bg-[var(--gruvbox-bg-soft)] px-5 py-4">

                    <p class="text-sm leading-8 text-[var(--gruvbox-fg)]">
                        {{ $blog->excerpt }}
                    </p>

                </div>
            @endif

            <article dir="{{ str_starts_with($blog->locale, 'fa') ? 'rtl' : 'ltr' }}" class=" markdown-content
        prose prose-lg max-w-none


        prose-headings:font-bold
        prose-headings:tracking-tight
        prose-headings:text-[var(--gruvbox-fg)]

        prose-h1:text-3xl
        prose-h2:mt-12 prose-h2:mb-5 prose-h2:border-b
        prose-h2:border-[var(--gruvbox-border)]
        prose-h2:pb-3 prose-h2:text-2xl

        prose-h3:mt-8 prose-h3:text-xl

        prose-p:leading-9
        prose-p:text-[var(--gruvbox-fg-muted)]

        prose-a:font-medium
        prose-a:text-[var(--gruvbox-yellow)]
        prose-a:underline-offset-4

        prose-strong:text-[var(--gruvbox-fg)]

        prose-ul:list-disc
        prose-ol:list-decimal
        prose-li:my-1
        prose-li:leading-8
        prose-li:text-[var(--gruvbox-fg-muted)]

        prose-blockquote:border-s-4
        prose-blockquote:border-[var(--gruvbox-yellow)]
        prose-blockquote:bg-[var(--gruvbox-bg-soft)]
        prose-blockquote:rounded-e-lg
        prose-blockquote:py-1
        prose-blockquote:text-[var(--gruvbox-fg-muted)]

        prose-code:rounded
        prose-code:bg-[var(--gruvbox-bg-soft)]
        prose-code:px-1.5
        prose-code:py-0.5
        prose-code:font-mono
        prose-code:text-[var(--gruvbox-yellow)]
        prose-code:before:content-none
        prose-code:after:content-none

        prose-pre:overflow-x-auto
        prose-pre:rounded-xl
        prose-pre:border
        prose-pre:border-[var(--gruvbox-border)]
        prose-pre:bg-[var(--gruvbox-bg-soft)]
        prose-pre:p-5
        prose-pre:text-sm
        prose-pre:leading-7
        prose-pre:text-[var(--gruvbox-fg)]

        prose-pre:[&_code]:bg-transparent
        prose-pre:[&_code]:p-0
        prose-pre:[&_code]:text-[var(--gruvbox-fg)]

        prose-table:w-full
        prose-table:text-sm
        prose-th:border-b
        prose-th:border-[var(--gruvbox-border)]
        prose-th:px-4 prose-th:py-3
        prose-th:text-[var(--gruvbox-fg)]
        prose-td:border-b
        prose-td:border-[var(--gruvbox-border)]
        prose-td:px-4 prose-td:py-3

        prose-hr:border-[var(--gruvbox-border)]
        prose-img:rounded-xl

        dark:prose-invert
    ">
                {!! \Illuminate\Support\Str::markdown($blog->content, [
    'html_input' => 'strip',
    'allow_unsafe_links' => false,
]) !!}
            </article>

        </main>

        {{-- Sidebar --}}
        <aside class="space-y-6 lg:sticky lg:top-8 lg:self-start">

            {{-- Table of Contents --}}
            @if (!empty($blog->table_of_contents))
                <section class="rounded-xl border border-[var(--gruvbox-border)] p-5">

                    <h2 class="mb-4 text-sm font-semibold text-[var(--gruvbox-fg)]">
                        Table of Contents
                    </h2>

                    <nav aria-label="Table of contents">
                        <ul class="space-y-3 text-sm text-[var(--gruvbox-fg-muted)]">

                            @foreach ($blog->table_of_contents as $heading)
                                <li>
                                    <a href="#{{ $heading['id'] ?? '' }}"
                                        class="block transition-colors hover:text-[var(--gruvbox-yellow)]">
                                        {{ $heading['text'] ?? '' }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </nav>

                </section>
            @endif

        </aside>

    </div>

    {{-- Back to Articles --}}
    <footer class="border-t border-[var(--gruvbox-border)] pt-8">

        <a href="{{ route('home') }}" wire:navigate
            class="inline-flex items-center gap-2 text-sm font-medium text-[var(--gruvbox-fg-muted)] transition-colors hover:text-[var(--gruvbox-yellow)]">
            <span aria-hidden="true">&larr;</span>
            Back to all articles
        </a>

    </footer>

</div>