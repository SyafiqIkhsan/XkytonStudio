@extends('layouts.adminlay')

@section('title', 'System Settings — Archive Studio')

@section('activeMenu', 'systemset')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-12">
            <h1 class="text-2xl font-semibold tracking-tight">System Settings</h1>
            <p class="text-xs text-neutral-500 mt-1">Configure your core engine parameters, repository access, and profile nodes.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-neutral-900 text-white text-xs uppercase tracking-wider rounded-none">
                {{ session('success') }}
            </div>
        @endif

        <form action="#" method="POST" class="space-y-10 text-xs">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div class="border-b border-neutral-200 pb-2">
                    <h2 class="text-sm font-medium uppercase tracking-wider text-neutral-800">Identity & Meta</h2>
                    <p class="text-neutral-400 mt-0.5">Public profile configurations rendered across the portfolio application.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="block uppercase tracking-wider font-medium text-neutral-500">System Identity / Email</label>
                        <input type="email" name="admin_email" value="admin@archivestudio.com" required
                               class="w-full border border-neutral-200 p-3 rounded-none bg-white focus:outline-none focus:border-neutral-900">
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="border-b border-neutral-200 pb-2">
                    <h2 class="text-sm font-medium uppercase tracking-wider text-neutral-800">External Endpoints</h2>
                    <p class="text-neutral-400 mt-0.5">Destinations for your source code repositories and social network hooks.</p>
                </div>

                <div class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="block uppercase tracking-wider font-medium text-neutral-500">GitHub Directory URL</label>
                        <a href="https://github.com/SyafiqIkhsan">https://github.com/SyafiqIkhsan</a>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="border-b border-neutral-200 pb-2">
                    <h2 class="text-sm font-medium uppercase tracking-wider text-neutral-800">Engine Controls</h2>
                    <p class="text-neutral-400 mt-0.5">Toggle global behaviors and access flags for the public index.</p>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="maintenance_mode" id="maintenance" value="1"
                                   class="w-4 h-4 accent-neutral-900 rounded-none border-neutral-200 cursor-pointer">
                        </div>
                        <div>
                            <label for="maintenance" class="block uppercase tracking-wider font-medium text-neutral-800 cursor-pointer">Restrict Public Index (Maintenance)</label>
                            <p class="text-neutral-400 mt-0.5 text-[11px]">When active, public visitors will hit a static hold screen while you adjust the core stack.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 pt-2">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="moderate_comments" id="moderation" value="1" checked
                                   class="w-4 h-4 accent-neutral-900 rounded-none border-neutral-200 cursor-pointer">
                        </div>
                        <div>
                            <label for="moderation" class="block uppercase tracking-wider font-medium text-neutral-800 cursor-pointer">Require Review for Comments</label>
                            <p class="text-neutral-400 mt-0.5 text-[11px]">Incoming public inquiries and comment logs will remain staged until authorized manually.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-6 border-t border-neutral-200">
                <a href="{{ route('admin.dashboard') }}"
                   class="border border-neutral-200 px-6 py-3.5 rounded-none hover:bg-neutral-100 transition-colors uppercase tracking-widest font-medium text-center">
                    Abort
                </a>
                <button type="submit"
                        class="bg-neutral-900 text-white px-8 py-3.5 rounded-none hover:bg-neutral-800 transition-colors uppercase tracking-widest font-medium">
                    Save Parameters
                </button>
            </div>
        </form>
    </div>
@endsection
