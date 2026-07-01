@extends('layouts.app')

@section('title', 'About')

@section('content')
<main class="flex-1 w-full max-w-5xl mx-auto px-6 py-16 md:py-24">

    <div class="grid grid-cols-1 md:grid-cols-12 gap-12 md:gap-24">

        <!-- Left Column: Title & Image Placeholder -->
        <div class="md:col-span-5 space-y-8">
            <div>
                <h1 class="font-serif text-4xl md:text-5xl font-light tracking-tight text-neutral-900 mb-4">
                    Syafiq Ikhsan
                </h1>
                <p class="text-xs text-neutral-400 uppercase tracking-widest leading-relaxed">
                    Software Developer & System Thinker based in Indonesia.
                </p>
            </div>

            <!-- Minimalist Image Box -->
            <div class="w-full aspect-[4/5] bg-neutral-100 border border-neutral-200 flex items-center justify-center p-8">
                <img src="/public/Syafiq.png" alt="Owner">
            </div>
        </div>

        <!-- Right Column: Biography & Details -->
        <div class="md:col-span-7 space-y-12 md:pt-4">

            <!-- Bio Text -->
            <div class="prose prose-neutral prose-sm md:prose-base font-light leading-relaxed text-neutral-600">
                <p class="mb-4">
                    Building digital solutions requires more than just writing code; it demands an understanding of the underlying systems. I am a software developer focusing on constructing clean, scalable web architectures. From orchestrating complex relational databases on the backend to crafting seamless user interfaces, I treat every project as an ecosystem.
                </p>
                <p>
                    My approach to engineering is highly analytical. Whether analyzing technical divergences in financial stock markets or mapping out the supply chain relations of local UMKM culinary businesses in West Java, I apply the same structured logic to solving business problems through technology.
                </p>
            </div>

            <!-- Divider -->
            <hr class="border-neutral-200">

            <!-- Skills & Interests Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">

                <!-- Tech Stack -->
                <div class="space-y-4">
                    <h3 class="text-xs uppercase tracking-widest font-medium text-neutral-900">Core Technologies</h3>
                    <ul class="space-y-2 text-sm text-neutral-500 font-mono">
                        <li>Laravel & PHP</li>
                        <li>React.js & Vite</li>
                        <li>Inertia.js</li>
                        <li>Tailwind CSS</li>
                        <li>Relational Databases (SQL)</li>
                        <li>RESTful API Design</li>
                    </ul>
                </div>

                <!-- Multidisciplinary Focus -->
                <div class="space-y-4">
                    <h3 class="text-xs uppercase tracking-widest font-medium text-neutral-900">Beyond Code</h3>
                    <ul class="space-y-2 text-sm text-neutral-600 font-light">
                        <li>Algorithmic Logic (125 Mensa Index)</li>
                        <li>Quantitative & Technical Market Analysis</li>
                        <li>Local Economic Ecosystems Structuring</li>
                        <li>Historical Social Stratification</li>
                    </ul>
                </div>

            </div>

            <!-- Contact Action -->
            <div class="pt-8">
                <a href="https://www.instagram.com/mttqien_/" class="inline-flex items-center gap-2 bg-neutral-900 text-white text-xs uppercase tracking-widest px-8 py-4 hover:bg-neutral-800 transition-colors rounded-none font-medium">
                    Initiate Connection
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>

        </div>
    </div>
</main>
@endsection
