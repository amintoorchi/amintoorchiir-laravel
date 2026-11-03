<!DOCTYPE html>
<html lang="en" dir="ltr"
    class="min-h-screen bg-[var(--gruvbox-bg)] text-[var(--gruvbox-fg)] antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="manifest" href="/manifest.webmanifest">
    <meta name="theme-color" content="#282828">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">

    <title>4min Toorchi - Landing Page</title>

    <meta name="apple-mobile-web-app-capable" content="yes">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @fluxAppearance
    @livewireStyles
</head>

<body class="min-h-screen bg-[var(--gruvbox-bg)] text-[var(--gruvbox-fg)] antialiased">

    <header class="border-b border-[var(--gruvbox-border)] bg-[var(--gruvbox-bg-soft)]">
        <div class="container mx-auto flex min-h-16 max-w-full items-center justify-between gap-6 px-6">

            <div class="flex gap-10">
                            {{-- Logo --}}
                        <a href="/" class="logo flex shrink-0 items-center gap-1 text-lg font-semibold tracking-tight text-[var(--gruvbox-fg)]! no-underline!">
                            <span class="logo__text">amin</span>
                            <span class="logo__chevron text-[var(--gruvbox-yellow)]!">&gt;</span>
                            <span class="logo__cursor text-[var(--gruvbox-yellow)]!">█</span>
                        </a>

                        {{-- Search --}}
                        <div class="search relative hidden w-full max-w-xs lg:block">
                            <input
                                id="search__text"
                                type="search"
                                placeholder="Search..."
                                aria-label="Search"
                                autocomplete="off"
                                class="w-full rounded-md! border border-[var(--gruvbox-border)]! bg-[var(--gruvbox-bg)]! px-3 py-2 text-sm text-[var(--gruvbox-fg)]! outline-none placeholder:text-[var(--gruvbox-fg-muted)] focus:border-[var(--gruvbox-primary)]! focus:ring-0!"
                            >

                            <div
                                id="search__suggestions"
                                class="search__suggestions--hidden absolute inset-x-0 top-full z-50 mt-2 rounded-md border border-[var(--gruvbox-border)] bg-[var(--gruvbox-bg-soft)] shadow-lg"
                            ></div>
                        </div>
            </div>

            <div class="flex gap-10 item-center ">
                        <nav id="menu" aria-label="Main navigation" class="hidden lg:block">
                            <ul class="menu--horizontal flex items-center gap-6 text-sm font-medium text-[var(--gruvbox-fg-muted)]">
                                <li class="menu__item">
                                    <a href="/" class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">Home</a>
                                </li>
                                <li class="menu__item">
                                    <a href="/blog/" class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">Blog</a>
                                </li>
                                <li class="menu__item">
                                    <a href="/contact/" class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">Contact</a>
                                </li>
                                <li class="menu__item">
                                    <a href="/links/" class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">Links</a>
                                </li>
                                <li class="menu__item">
                                    <a href="/about/" class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">About</a>
                                </li>
                                <li class="menu__item">
                                    <a href="/support/" class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">Support</a>
                                </li>
                            </ul>
                        </nav>

                        <!-- {{-- Mobile Menu --}}
                        <div class="menu__burger relative lg:hidden" x-data="{ open: false }">

                            <button
                                type="button"
                                @click="open = !open"
                                :aria-expanded="open"
                                aria-label="Toggle navigation"
                                class="flex size-10 items-center justify-center rounded-full! border-0! bg-transparent! p-0! text-[var(--gruvbox-fg-muted)] transition-colors hover:bg-[var(--gruvbox-hover)]! hover:text-[var(--gruvbox-yellow)]!"
                            >
                                <flux:icon x-show="!open" name="bars-3" class="size-6" />
                                <flux:icon x-show="open" name="x-mark" class="size-6" />
                            </button>

                            <ul
                                x-cloak
                                x-show="open"
                                @click.outside="open = false"
                                class="menu--vertical absolute top-full right-0 z-50 mt-3 flex min-w-48 flex-col gap-1 rounded-md border border-[var(--gruvbox-border)] bg-[var(--gruvbox-bg-soft)] p-2 shadow-lg"
                            >
                                <li><a href="/" class="menu__item block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">Home</a></li>
                                <li><a href="/blog/" class="menu__item block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">Blog</a></li>
                                <li><a href="/contact/" class="menu__item block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">Contact</a></li>
                                <li><a href="/links/" class="menu__item block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">Links</a></li>
                                <li><a href="/about/" class="menu__item block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">About</a></li>
                                <li><a href="/support/" class="menu__item block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">Support</a></li>
                            </ul>
                        </div> -->

                        <button
                            type="button"
                            x-data
                            @click="$flux.dark = !$flux.dark"
                            aria-label="Toggle theme"
                            class="theme__toggle flex size-10 shrink-0 items-center justify-center rounded-full! border-0! bg-transparent! p-0! text-[var(--gruvbox-fg-muted)] transition-colors hover:bg-[var(--gruvbox-hover)]! hover:text-[var(--gruvbox-yellow)]!"
                        >
                            <flux:icon x-show="!$flux.dark" name="moon" class="size-5" />
                            <flux:icon x-show="$flux.dark" name="sun" class="size-5" />
                        </button>
            </div>

        </div>
    </header>

    <main class="mx-auto max-w-full !py-0">
        {{ $slot }}
    </main>

    <footer class="mt-20 mb-10 border-t border-[var(--gruvbox-border)] bg-[var(--gruvbox-bg-soft)] sm:!mb-0">
        <div class="py-2 flex justify-center">
            <a
                href="https://github.com/amintoorchi"
                target="_blank"
                rel="noopener noreferrer"
                class="text-[10px] text-[var(--gruvbox-fg-muted)] transition-colors hover:text-[var(--gruvbox-yellow)]"
            >
                © {{ now()->year }} Amin Toorchi
            </a>
        </div>
    </footer>

    @livewireScripts
    @fluxScripts

</body>
</html>