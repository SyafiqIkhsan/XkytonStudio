@extends('layouts.adminlay')

@section('title', 'Comment Logs — Archive Studio')

@section('activeMenu', 'comments')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-12">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight">Comment Logs</h1>
            <p class="text-xs text-neutral-500 mt-1">Review, monitor, and moderate feedback attached to your deployment nodes.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs px-5 py-3 mb-6 flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full inline-block"></span>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-neutral-200/80 overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm min-w-[600px]">
            <thead>
                <tr class="bg-neutral-50 text-neutral-400 uppercase text-[11px] tracking-wider border-b border-neutral-200">
                    <th class="py-4 px-6 font-medium w-1/4">Visitor / Identity</th>
                    <th class="py-4 px-6 font-medium w-1/4">Target Project</th>
                    <th class="py-4 px-6 font-medium w-1/3">Comment Staged</th>
                    <th class="py-4 px-6 font-medium text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @forelse($comments as $comment)
                <tr class="hover:bg-neutral-50/50 transition-colors">
                    <td class="py-4 px-6">
                        <div class="font-medium text-neutral-900">{{ $comment->name }}</div>
                        <div class="text-[11px] text-neutral-400 font-mono mt-0.5">{{ $comment->email }}</div>
                    </td>
                    <td class="py-4 px-6">
                        <span class="bg-neutral-100 text-neutral-800 px-2.5 py-1 text-xs font-mono uppercase tracking-wider">
                            {{ $comment->project->title ?? 'Unknown' }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-neutral-600 font-light leading-relaxed text-xs">
                        "{{ $comment->comment }}"
                    </td>
                    <td class="py-4 px-6 text-right">
                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="inline-block" onsubmit="return confirm('Purge this comment permanently?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-600 hover:text-red-900 underline underline-offset-4">Purge</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-12 text-center text-xs text-neutral-400 uppercase tracking-wider">No comments found in repository logs.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
