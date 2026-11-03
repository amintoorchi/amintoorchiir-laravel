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

    <main class="mx-auto grid w-full max-w-full flex-1 grid-cols-1 gap-8  !py-8 lg:grid-cols-[7fr_3fr] lg:mt-10">

        {{-- Blog Content: 70% --}}
        <div class="min-w-0 px-3 sm:px-10 md:px-10 lg:px-25 xl:px-50   ">
            {{ $slot }}
        </div>

        {{-- Sidebar: 30% --}}
        <aside class="hidden min-w-0 pr-40 text-center lg:flex">
            <div class="sticky top-6 space-y-6">

                <section class="space-y-2">
                    <h2 class="text-2xl font-bold text-[var(--gruvbox-fg)]">
                        Amin Toorchi
                    </h2>

                    <h2 class="text-sm text-[var(--gruvbox-fg-muted)]">
                        Backend Developer · Linux · DevOps Enthusiast
                    </h2>
                </section>

                <hr>

                <section class="space-y-4 text-center">

                    {{-- Email --}}
                    <div class="text-sm text-[var(--gruvbox-fg-muted)]">
                        amin.tourchie@gmail.com
                    </div>

                    {{-- Website --}}
                    <div class="text-sm">
                        <a href="https://amintoorchi.ir" target="_blank" rel="noopener noreferrer"
                            class="text-[var(--gruvbox-fg-muted)] transition-colors hover:text-[var(--gruvbox-yellow)]">
                            amintoorchi.ir
                        </a>
                    </div>

                    <hr class="border-[var(--gruvbox-border)]">

                    {{-- Social Profiles --}}
                    <div class="flex flex-col gap-3">

                        {{-- GitHub --}}
                        <a href="https://github.com/amintoorchi" target="_blank" rel="noreferrer me"
                            class="group flex items-center justify-center gap-2 text-sm text-[var(--gruvbox-fg-muted)] transition-colors hover:text-[var(--gruvbox-yellow)]">

                            <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="size-4">
                                <title>GitHub</title>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.387.6.113.82-.258.82-.577v-2.234c-3.338.726-4.043-1.416-4.043-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.09-.745.082-.73.082-.73 1.205.085 1.838 1.237 1.838 1.237 1.07 1.834 2.807 1.304 3.492.997.108-.775.418-1.304.762-1.604-2.665-.303-5.467-1.333-5.467-5.93 0-1.31.468-2.38 1.235-3.22-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.3 1.23a11.5 11.5 0 0 1 6 0c2.29-1.552 3.297-1.23 3.297-1.23.653 1.652.242 2.873.118 3.176.77.84 1.233 1.91 1.233 3.22 0 4.61-2.807 5.624-5.48 5.92.43.37.814 1.102.814 2.222v3.293c0 .322.216.694.825.576C20.565 21.796 24 17.297 24 12c0-6.63-5.37-12-12-12Z" />
                            </svg>

                            <span>@amintoorchi</span>
                        </a>

                        {{-- LinkedIn --}}
                        <a href="https://linkedin.com/in/amintoorchi" target="_blank" rel="noreferrer me"
                            class="group flex items-center justify-center gap-2 text-sm text-[var(--gruvbox-fg-muted)] transition-colors hover:text-[var(--gruvbox-yellow)]">

                            <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="size-4">
                                <title>LinkedIn</title>
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.35V9h3.414v1.561h.049c.476-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286ZM5.337 7.433a2.062 2.062 0 1 1 0-4.124 2.062 2.062 0 0 1 0 4.124ZM7.119 20.452H3.555V9h3.564v11.452ZM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003Z" />
                            </svg>

                            <span>amintoorchi</span>
                        </a>

                    </div>

                </section>

            </div>
        </aside>

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