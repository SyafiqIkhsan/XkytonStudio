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
                {{-- Menggunakan data palsu / placeholder untuk visual, ganti dengan @forelse($comments as $comment) nanti --}}
                <tr class="hover:bg-neutral-50/50 transition-colors alignment-top">
                    <td class="py-4 px-6 valign-top">
                        <div class="font-medium text-neutral-900">Alex Johnston</div>
                        <div class="text-[11px] text-neutral-400 font-mono mt-0.5">alex@example.com</div>
                    </td>
                    <td class="py-4 px-6">
                        {{-- Memanggil nama proyek lewat relasi belongsTo --}}
                        <span class="bg-neutral-100 text-neutral-800 px-2.5 py-1 text-xs font-mono uppercase tracking-wider">
                            Otobuy Marketplace
                        </span>
                    </td>
                    <td class="py-4 px-6 text-neutral-600 font-light leading-relaxed text-xs">
                        "The system architecture diagram looks solid. How did you handle the state sync between React and Laravel on the live dynamic filters?"
                    </td>
                    <td class="py-4 px-6 text-right">
                        <form action="#" method="POST" class="inline-block" onsubmit="return confirm('Purge this comment permanently?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-600 hover:text-red-900 underline underline-offset-4">Purge</button>
                        </form>
                    </td>
                </tr>

                <tr class="hover:bg-neutral-50/50 transition-colors">
                    <td class="py-4 px-6">
                        <div class="font-medium text-neutral-900">Sarah Dev</div>
                        <div class="text-[11px] text-neutral-400 font-mono mt-0.5">sarah.d@tech.io</div>
                    </td>
                    <td class="py-4 px-6">
                        <span class="bg-neutral-100 text-neutral-800 px-2.5 py-1 text-xs font-mono uppercase tracking-wider">
                            Geco Culinary Ecosystem
                        </span>
                    </td>
                    <td class="py-4 px-6 text-neutral-600 font-light leading-relaxed text-xs">
                        "Impressive breakdown of the local supply chain relations in Cianjur! Clean interface design as well."
                    </td>
                    <td class="py-4 px-6 text-right">
                        <form action="#" method="POST" class="inline-block" onsubmit="return confirm('Purge this comment permanently?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-600 hover:text-red-900 underline underline-offset-4">Purge</button>
                        </form>
                    </td>
                </tr>

                {{-- Struktur Kosong Jika Tidak Ada Komentar --}}
                {{--
                @empty
                <tr>
                    <td colspan="4" class="py-12 text-center text-xs text-neutral-400 uppercase tracking-wider">No comments found in repository logs.</td>
                </tr>
                @endforelse
                --}}
            </tbody>
        </table>
    </div>
@endsection
