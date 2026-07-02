@extends('layouts.app')

@section('title', 'Detail')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Detail Project</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="max-w-4xl mx-auto py-10 px-4">
        <!-- DETAIL PROJECT -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            @if($project->image_path)
                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-auto rounded-lg mb-4">
            @endif
            <h1 class="text-3xl font-bold mb-4">{{ $project->title }}</h1>
            <p class="text-gray-600 leading-relaxed mb-6">{{ $project->description }}</p>
            <div class="text-sm text-gray-400">Dibuat pada: {{ $project->created_at->format('d M Y') }}</div>
        </div>

        <!-- KOLOM KOMENTAR -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-6">Komentar ({{ $project->rootComments->count() }})</h2>

            <!-- Notifikasi Sukses -->
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Tambah Komentar -->
            <form action="{{ route('comment.store', $project) }}" method="POST" class="mb-8 border-b pb-6">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Anda</label>
                    <input type="text" name="name" required class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Masukkan nama...">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" required class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Masukkan email...">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Komentar</label>
                    <textarea name="comment" rows="4" required class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Tulis komentar di sini..."></textarea>
                    @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium text-sm transition">
                    Kirim Komentar
                </button>
            </form>

            <!-- Daftar Komentar -->
            <div class="space-y-4">
                @forelse($project->rootComments as $comment)
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-semibold text-gray-900">{{ $comment->name }}</span>
                            <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-700 text-sm whitespace-pre-line">{{ $comment->comment }}</p>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm text-center py-4">Belum ada komentar. Jadilah yang pertama!</p>
                @endforelse
            </div>

        </div>
    </div>

</body>
</html>
@endsection
