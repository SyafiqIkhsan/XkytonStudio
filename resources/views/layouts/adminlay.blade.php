<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Console — Archive Studio')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('head')
</head>
<body class="bg-neutral-50 text-neutral-900 font-sans antialiased">

    <button id="sidebarToggle" onclick="document.getElementById('adminSidebar').classList.toggle('-translate-x-full')" class="fixed top-4 left-4 z-50 md:hidden p-2 bg-white border border-neutral-200 rounded-none text-neutral-500 hover:text-neutral-900 transition-colors" aria-label="Toggle sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </button>

    <div class="flex min-h-screen">
        <aside id="adminSidebar" class="fixed md:sticky top-0 left-0 z-40 w-64 bg-white border-r border-neutral-200 px-6 py-8 h-screen overflow-y-auto -translate-x-full md:translate-x-0 transition-transform duration-200">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-sm font-bold tracking-widest uppercase text-neutral-400">Management</h2>
                <button onclick="document.getElementById('adminSidebar').classList.add('-translate-x-full')" class="md:hidden text-neutral-400 hover:text-neutral-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <nav class="space-y-1.5 text-sm font-medium">
                @php $active = $activeMenu ?? ''; @endphp
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2.5 rounded-none transition-colors @if($active === 'dashboard') bg-neutral-900 text-white @else text-neutral-600 hover:bg-neutral-100 @endif">Web Projects</a>
                <a href="{{ route('comments.index') }}" class="flex items-center px-4 py-2.5 rounded-none transition-colors @if($active === 'comments') bg-neutral-900 text-white @else text-neutral-600 hover:bg-neutral-100 @endif">Comment Logs</a>
                <a href="{{ route('system.index') }}" class="flex items-center px-4 py-2.5 rounded-none transition-colors @if($active === 'systemset') bg-neutral-900 text-white @else text-neutral-600 hover:bg-neutral-100 @endif">System Settings</a>
                <a href="/" class="flex items-center px-4 py-2.5 text-neutral-600 hover:bg-neutral-100 transition-colors rounded-none border-t border-neutral-100 mt-4">View Live Site</a>

                <form action="{{ route('logout') }}" method="POST" class="block pt-2">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2.5 text-red-600 hover:bg-red-50 transition-colors rounded-none text-xs uppercase tracking-wider font-semibold">
                        Exit Session
                    </button>
                </form>
            </nav>
        </aside>

        <main class="flex-1 p-6 md:p-12 pt-16 md:pt-12">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
