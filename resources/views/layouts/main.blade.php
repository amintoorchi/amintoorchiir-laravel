<!DOCTYPE html>
<html lang="en" dir="ltr" class="min-h-screen bg-[var(--gruvbox-bg)] text-[var(--gruvbox-fg)] antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#282828">

    <title>4min Toorchi - Landing Page</title>

    <meta name="apple-mobile-web-app-capable" content="yes">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @fluxAppearance
    @livewireStyles
</head>

<body class="flex min-h-screen flex-col bg-[var(--gruvbox-bg)] text-[var(--gruvbox-fg)] antialiased">

    <header class="border-b border-[var(--gruvbox-border)] bg-[var(--gruvbox-bg-soft)]">
        <div class="container mx-auto flex h-13 max-w-full items-center justify-between px-6 ">

            <div class="flex justify-center items-center align-middle gap-10">
                {{-- Logo --}}
                <a href="/"
                    class="logo flex shrink-0 items-center gap-1 text-lg font-bold tracking-tight text-[var(--gruvbox-fg)]! no-underline!">

                    <span class="logo__text">amin</span>
                    <span class="logo__chevron text-[var(--gruvbox-yellow)]!">&gt;</span>
                    <span class="logo__cursor text-[var(--gruvbox-yellow)]!">█</span>
                </a>

                {{-- Search --}}
                <div class="search relative hidden w-full max-w-xs lg:block">
                    <input id="search__text" type="search" placeholder="Search..." aria-label="Search"
                        autocomplete="off"
                        class="w-full rounded-md! border border-[var(--gruvbox-border)]! bg-[var(--gruvbox-bg)]! px-3 py-1 text-sm text-[var(--gruvbox-fg)]! outline-none placeholder:text-[var(--gruvbox-fg-muted)] focus:border-[var(--gruvbox-primary)]!">

                    <div id="search__suggestions"
                        class="search__suggestions--hidden absolute inset-x-0 top-full z-50 mt-2 rounded-md border border-[var(--gruvbox-border)] bg-[var(--gruvbox-bg-soft)] shadow-lg">
                    </div>
                </div>
            </div>

            <div class="flex justify-center items-center align-middle gap-4 ">
                {{-- Desktop Navigation --}}
                <nav id="menu" aria-label="Main navigation" class="hidden lg:block">
                    <ul
                        class="menu--horizontal flex items-center gap-6 text-xl text-[var(--gruvbox-fg-muted)] font-extrabold">
                        <li class="menu__item">
                            <a href="/"
                                class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">
                                Home
                            </a>
                        </li>

                        <li class="menu__item">
                            <a href="/blog/"
                                class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">
                                Blog
                            </a>
                        </li>

                        <li class="menu__item">
                            <a href="/contact/"
                                class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">
                                Contact
                            </a>
                        </li>

                        <li class="menu__item">
                            <a href="/links/"
                                class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">
                                Links
                            </a>
                        </li>

                        <li class="menu__item">
                            <a href="/about/"
                                class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">
                                About
                            </a>
                        </li>

                        <li class="menu__item">
                            <a href="/support/"
                                class="text-[var(--gruvbox-fg-muted)]! no-underline! transition-colors hover:text-[var(--gruvbox-yellow)]!">
                                Support
                            </a>
                        </li>

                    </ul>
                </nav>

                {{-- Mobile Menu --}}
                <div class="menu__burger relative lg:hidden" x-data="{ open: false }">

                    <button type="button" @click="open = !open" :aria-expanded="open" aria-label="Open main menu"
                        class="flex size-10 items-center justify-center rounded-full! border-0! bg-transparent! p-0! text-[var(--gruvbox-fg-muted)] transition-colors hover:bg-[var(--gruvbox-hover)]! hover:text-[var(--gruvbox-yellow)]!">
                        <flux:icon x-show="!open" name="bars-3" class="size-6" />
                        <flux:icon x-show="open" name="x-mark" class="size-6" />
                    </button>

                    <ul x-cloak x-show="open" @click.outside="open = false"
                        class="menu--vertical absolute top-full right-0 z-50 mt-3 flex min-w-48 flex-col gap-1 rounded-md border border-[var(--gruvbox-border)] bg-[var(--gruvbox-bg-soft)] p-2 shadow-lg">
                        <li>
                            <a href="/"
                                class="block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="/blog/"
                                class="block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">
                                Blog
                            </a>
                        </li>

                        <li>
                            <a href="/contact/"
                                class="block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">
                                Contact
                            </a>
                        </li>

                        <li>
                            <a href="/links/"
                                class="block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">
                                Links
                            </a>
                        </li>

                        <li>
                            <a href="/about/"
                                class="block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">
                                About
                            </a>
                        </li>

                        <li>
                            <a href="/support/"
                                class="block rounded px-3 py-2 text-[var(--gruvbox-fg-muted)]! no-underline! hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]!">
                                Support
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Theme Toggle --}}
                <button type="button" x-data @click="$flux.dark = !$flux.dark" aria-label="Toggle theme"
                    class="theme__toggle flex size-10 shrink-0 items-center justify-center rounded-full! border-0! bg-transparent! p-0! text-[var(--gruvbox-fg-muted)] transition-colors hover:bg-[var(--gruvbox-hover)]! hover:text-[var(--gruvbox-yellow)]!">
                    <flux:icon x-show="!$flux.dark" name="moon" class="size-5" />
                    <flux:icon x-show="$flux.dark" name="sun" class="size-5" />
                </button>
            </div>

        </div>
    </header>

    <main class="mx-auto w-full max-w-full flex-1 !py-8">
        {{ $slot }}
    </main>

    <footer class="mt-20 border-t border-[var(--gruvbox-border)] bg-[var(--gruvbox-bg-soft)]">
        <div class="flex justify-center py-2">
            <a href="https://github.com/amintoorchi" target="_blank" rel="noopener noreferrer"
                class="text-[10px] text-[var(--gruvbox-fg-muted)] transition-colors hover:text-[var(--gruvbox-yellow)]">
                © {{ now()->year }} Amin Toorchi
            </a>
        </div>
    </footer>

    @livewireScripts
    @fluxScripts

</body>

</html>