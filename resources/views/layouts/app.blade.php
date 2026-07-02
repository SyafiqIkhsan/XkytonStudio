<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Programmer Portfolio') — Xkyton Studio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { background-color: #fcfcfc; }
    </style>
</head>
<body class="text-neutral-900 antialiased selection:bg-neutral-200">

    <header class="border-b border-neutral-100 sticky top-0 bg-[#fkfkfk]/80 backdrop-blur-sm z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/" class="font-serif text-xl font-medium tracking-tight">Xkyton</a>
            <nav class="hidden md:flex items-center space-x-8 text-xs uppercase tracking-widest text-neutral-500">
                <a href="/" class="{{ request()->is('/') ? 'text-neutral-900 border-b border-neutral-900' : 'hover:text-neutral-900 transition-colors' }} pb-1">About</a>
                <a href="/portofolio/work" class="{{ request()->is('portofolio/work') ? 'text-neutral-900 border-b border-neutral-900' : 'hover:text-neutral-900 transition-colors' }} pb-1">Works</a>
            </nav>
            <div class="flex items-center gap-3">
                <a href="/admin/dashboard" class="text-xs text-neutral-400 hover:text-neutral-900 transition-colors hidden sm:inline">Admin?</a>
                <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="md:hidden p-2 text-neutral-500 hover:text-neutral-900 transition-colors" aria-label="Toggle menu">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <div id="mobileMenu" class="hidden md:hidden border-b border-neutral-100 bg-[#fcfcfc]">
        <div class="max-w-7xl mx-auto px-6 py-6 space-y-4 text-xs uppercase tracking-widest text-neutral-500">
            <a href="/" class="{{ request()->is('/') ? 'text-neutral-900 border-b border-neutral-900' : 'hover:text-neutral-900 transition-colors' }} pb-1 block">Works</a>
            <a href="/portofolio/about" class="{{ request()->is('portofolio/about') ? 'text-neutral-900 border-b border-neutral-900' : 'hover:text-neutral-900 transition-colors' }} pb-1 block">About</a>
            <a href="/admin/dashboard" class="hover:text-neutral-900 transition-colors pb-1 block">Admin</a>
        </div>
    </div>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <footer class="border-t border-neutral-200/60 bg-[#DDDDDD] py-12 mt-20">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="space-y-1 text-center md:text-left">
                <h3 class="font-serif text-lg font-medium text-neutral-800">Xkyton Studio</h3>
                <p class="text-xs text-neutral-400">&copy; {{ date('Y') }} Portfolio. Engineered with elegance.</p>
            </div>
            <div class="flex gap-x-8 text-xs uppercase tracking-wider text-neutral-500">
                <a href="https://github.com/SyafiqIkhsan" class="hover:text-neutral-900">Github</a>
            </div>
        </div>
    </footer>
</body>
</html>
