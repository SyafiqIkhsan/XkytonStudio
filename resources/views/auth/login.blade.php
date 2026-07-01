<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In — Archive Studio</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Playfair+Display:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
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
<body class="text-neutral-900 antialiased min-h-screen flex flex-col justify-between">

    <!-- Top Branding Bar -->
    <header class="p-6">
        <a href="/" class="font-serif text-xl font-medium tracking-tight inline-block">
            Xkyton Studio
        </a>
    </header>

    <!-- Login Card Container -->
    <main class="w-full max-w-sm mx-auto px-6 py-12">
        <div class="space-y-8">
            <!-- Header Form -->
            <div class="space-y-2 text-center sm:text-left">
                <h1 class="font-serif text-3xl font-light tracking-tight text-neutral-900">Admin Access</h1>
            </div>

            <!-- Error Alerts (Laravel Default Error Handling) -->
            @if ($errors->any())
                <div class="p-4 bg-neutral-100 border-l border-neutral-900 text-xs text-neutral-700 rounded-none space-y-1">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-5 text-xs">
                @csrf

                <!-- Email Input -->
                <div class="space-y-1.5">
                    <label for="email" class="block uppercase tracking-wider font-medium text-neutral-500">Identity / Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                           class="w-full bg-white border border-neutral-200 px-4 py-3 text-sm focus:outline-none focus:border-neutral-900 rounded-none transition-colors">
                </div>

                <!-- Password Input -->
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center">
                        <label for="password" class="block uppercase tracking-wider font-medium text-neutral-500">Security Key / Password</label>
                    </div>
                    <input type="password" name="password" id="password" required
                           class="w-full bg-white border border-neutral-200 px-4 py-3 text-sm focus:outline-none focus:border-neutral-900 rounded-none transition-colors">
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between pt-1">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 accent-neutral-900 rounded-none cursor-pointer">
                        <label for="remember" class="text-neutral-500 select-none cursor-pointer uppercase tracking-wider font-medium">Keep session alive</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full bg-neutral-900 text-white text-xs uppercase tracking-widest py-3.5 hover:bg-neutral-800 transition-colors rounded-none font-medium">
                        Authenticate
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Minimal Footer -->
    <footer class="p-6 text-center">
        <p class="text-[10px] text-neutral-400 uppercase tracking-widest">&copy; {{ date('Y') }} Xkyton Studio</p>
    </footer>

</body>
</html>
