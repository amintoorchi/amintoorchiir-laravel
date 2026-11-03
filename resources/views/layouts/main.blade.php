<!DOCTYPE html>
<html lang="en" dir="ltr"
    class="min-h-screen bg-natural-50 text-zinc-900 antialiased dark:bg-zinc-950 dark:text-zinc-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="manifest" href="/manifest.webmanifest">
    <meta name="theme-color" content="#18181b">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">
    <title>4min Toorchi - Landing Page</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
    @livewireStyles
</head>

<body class="min-h-screen bg-natural-50 text-zinc-900 antialiased dark:bg-zinc-950 dark:text-zinc-100">

    <header class="border-b border-zinc-200/80 bg-white/80 dark:border-zinc-800/80 dark:bg-zinc-950/80">
        <div class="container mx-auto flex h-16 max-w-full items-center justify-between px-6">

            <a href="/" class="shrink-0 text-lg font-semibold tracking-tight text-zinc-900 dark:text-white">
                4min Toorchi
            </a>

            <div class="hidden items-center gap-8 lg:flex">

                <nav aria-label="Main navigation">
                    <ul class="flex items-center gap-6 text-sm font-medium text-zinc-600 dark:text-zinc-400">
                        <li><a href="#" class="transition-colors hover:text-zinc-950 dark:hover:text-white">Home</a></li>
                        <li><a href="#" class="transition-colors hover:text-zinc-950 dark:hover:text-white">Blog</a></li>
                        <li><a href="#" class="transition-colors hover:text-zinc-950 dark:hover:text-white">Contact</a></li>
                        <li><a href="#" class="transition-colors hover:text-zinc-950 dark:hover:text-white">Links</a></li>
                        <li><a href="#" class="transition-colors hover:text-zinc-950 dark:hover:text-white">About</a></li>
                        <li><a href="#" class="transition-colors hover:text-zinc-950 dark:hover:text-white">Support</a></li>
                    </ul>
                </nav>

                <button
                    type="button"
                    x-data
                    @click="$flux.dark = !$flux.dark"
                    aria-label="Toggle theme"
                    class="flex size-10 items-center justify-center rounded-full text-zinc-600 transition-colors hover:bg-zinc-100 hover:text-zinc-950 dark:text-zinc-400 dark:hover:bg-zinc-800 dark:hover:text-white"
                >
                    <flux:icon x-show="!$flux.dark" name="moon" class="size-5" />
                    <flux:icon x-show="$flux.dark" name="sun" class="size-5" />
                </button>

            </div>

        </div>
    </header>

    <main class="mx-auto max-w-full !py-0 ">
        {{ $slot }}
    </main>

    <footer class="mt-20 border-t border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-950 mb-10 sm:!mb-0">
            <div
                class="flex justify-center mt-8">
                <a href="https://github.com/amintoorchi" target="_blank" rel="noopener noreferrer" class="text-[10px] text-zinc-400 dark:text-zinc-500">

                    © {{ now()->year }}
                    Amin Toorchi
                </a>
            </div>
    </footer>


    @livewireScripts

    @fluxScripts

</body>

</html>