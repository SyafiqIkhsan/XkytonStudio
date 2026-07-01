@extends('layouts.app')

@section('title', 'Works - Xkyton')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16">
    <header class="max-w-3xl mb-20">
        <span class="text-xs uppercase tracking-widest text-neutral-400 block mb-3">Systems & Web Applications</span>
        <h1 class="font-serif text-4xl md:text-5xl font-light tracking-tight text-neutral-900 leading-tight">
            Curated digital architectures, clean-coded interfaces, and robust backend ecosystems.
        </h1>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-16">

        @forelse($projects as $project)
        <a href="{{ route('portofolio.show', $project->slug) }}" class="group block">
            <article>
                <div class="w-full bg-neutral-100 aspect-[16/10] mb-4 overflow-hidden flex items-center justify-center text-neutral-400 italic border border-neutral-200/40 group-hover:opacity-90 transition-opacity">
                    @if ($project->image_path && count(json_decode($project->image_path, true)) > 0)
                        <img src="{{ asset(json_decode($project->image_path, true)[0]) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-xs uppercase tracking-widest">[ {{ $project->title }} ]</span>
                    @endif
                </div>
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-serif text-xl font-medium text-neutral-900 group-hover:underline underline-offset-4">{{ $project->title }}</h3>
                        <p class="text-xs text-neutral-500 mt-1">{{ $project->tech_stack }}</p>
                    </div>
                    <span class="text-xs uppercase tracking-wider text-neutral-400 mt-1">{{ $project->year }}</span>
                </div>
            </article>
        </a>
        @empty
        <div class="col-span-full text-center py-20">
            <p class="text-xs uppercase tracking-widest text-neutral-400">No projects yet.</p>
        </div>
        @endforelse

    </div>
</div>
@endsection
