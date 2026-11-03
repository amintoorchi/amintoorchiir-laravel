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
        <div class="container mx-auto flex h-16 max-w-full items-center justify-between px-6">

            <a href="/" class="shrink-0 text-lg font-semibold tracking-tight text-[var(--gruvbox-fg)]">
                Amin Toorchi
            </a>

            <div class="hidden items-center gap-8 lg:flex">

                <nav aria-label="Main navigation">
                    <ul class="flex items-center gap-6 text-sm font-medium text-[var(--gruvbox-fg-muted)]">
                        <li><a href="#" class="transition-colors hover:text-[var(--gruvbox-yellow)]">Home</a></li>
                        <li><a href="#" class="transition-colors hover:text-[var(--gruvbox-yellow)]">Blog</a></li>
                        <li><a href="#" class="transition-colors hover:text-[var(--gruvbox-yellow)]">Contact</a></li>
                        <li><a href="#" class="transition-colors hover:text-[var(--gruvbox-yellow)]">Links</a></li>
                        <li><a href="#" class="transition-colors hover:text-[var(--gruvbox-yellow)]">About</a></li>
                        <li><a href="#" class="transition-colors hover:text-[var(--gruvbox-yellow)]">Support</a></li>
                    </ul>
                </nav>

                <button
                    type="button"
                    x-data
                    @click="$flux.dark = !$flux.dark"
                    aria-label="Toggle theme"
                    class="theme-toggle flex size-10 items-center justify-center rounded-full border-0 bg-transparent p-0 text-[var(--gruvbox-fg-muted)] transition-colors hover:bg-[var(--gruvbox-hover)] hover:text-[var(--gruvbox-yellow)]"
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
        <div class="mt-8 flex justify-center">
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