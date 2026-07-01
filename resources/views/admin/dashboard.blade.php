@extends('layouts.adminlay')

@section('title', 'Console Dashboard — Archive Studio')

@section('activeMenu', 'dashboard')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-12">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight">Web Projects</h1>
            <p class="text-xs text-neutral-500 mt-1">Create, update, and deploy your stack logs.</p>
        </div>
        <button onclick="document.getElementById('createModal').classList.remove('hidden')" class="bg-neutral-900 text-white text-xs uppercase tracking-widest px-5 py-3 hover:bg-neutral-800 transition-colors rounded-none inline-flex items-center gap-2">
            + Add Deployment
        </button>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs px-5 py-3 mb-6 flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full inline-block"></span>
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="bg-red-50 border border-red-200 text-red-800 text-xs px-5 py-3 mb-6 flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-red-500 rounded-full inline-block"></span>
            {{ session('error') }}
        </div>
    @elseif ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 text-xs px-5 py-3 mb-6 flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-red-500 rounded-full inline-block"></span>
            {{ $errors->first() }}
        </div>
    @endif

    <div class="bg-white border border-neutral-200/80 overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm min-w-[600px]">
            <thead>
                <tr class="bg-neutral-50 text-neutral-400 uppercase text-[11px] tracking-wider border-b border-neutral-200">
                    <th class="py-4 px-6 font-medium">Project Name</th>
                    <th class="py-4 px-6 font-medium">Tech Stack</th>
                    <th class="py-4 px-6 font-medium">Year</th>
                    <th class="py-4 px-6 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @forelse($projects as $project)
                <tr class="hover:bg-neutral-50/50 transition-colors">
                    <td class="py-4 px-6 font-medium text-neutral-900">{{ $project->title }}</td>
                    <td class="py-4 px-6 text-neutral-500 font-mono text-xs">{{ $project->tech_stack }}</td>
                    <td class="py-4 px-6 text-neutral-500">{{ $project->year }}</td>
                    <td class="py-4 px-6 text-right space-x-3">
                        <button onclick="openEditModal({{ json_encode($project) }})" class="text-xs text-neutral-600 hover:text-neutral-900 underline underline-offset-4">Edit</button>

                        <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Archive this record permanently?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-600 hover:text-red-900 underline underline-offset-4">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-8 text-center text-xs text-neutral-400 uppercase tracking-wider">No active logs found in repository.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div id="createModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center p-4 z-50 hidden">
        <div class="bg-white max-w-lg w-full p-8 border border-neutral-200 shadow-xl space-y-6">
            <div class="flex justify-between items-center border-b border-neutral-100 pb-4">
                <h3 class="text-base font-semibold uppercase tracking-wider">Deploy New Project</h3>
                <button onclick="document.getElementById('createModal').classList.add('hidden')" class="text-neutral-400 hover:text-neutral-900 text-lg">&times;</button>
            </div>
            <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
                @csrf
                <div>
                    <label for="title" class="block uppercase tracking-wider font-medium text-neutral-500 mb-1.5">App / Project Name</label>
                    <input type="text" name="title" id="title" required value="{{ old('title') }}" class="w-full border border-neutral-200 p-3 rounded-none focus:outline-none focus:border-neutral-900">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="tech_stack" class="block uppercase tracking-wider font-medium text-neutral-500 mb-1.5">Tech Stack</label>
                        <input type="text" name="tech_stack" id="tech_stack" required placeholder="e.g. Node, Vue, MySQL" value="{{ old('tech_stack') }}" class="w-full border border-neutral-200 p-3 rounded-none focus:outline-none focus:border-neutral-900">
                    </div>
                    <div>
                        <label for="year" class="block uppercase tracking-wider font-medium text-neutral-500 mb-1.5">Year</label>
                        <input type="text" name="year" id="year" required placeholder="e.g. 2026" value="{{ old('year') }}" class="w-full border border-neutral-200 p-3 rounded-none focus:outline-none focus:border-neutral-900">
                    </div>
                </div>
                <div>
                    <label for="description" class="block uppercase tracking-wider font-medium text-neutral-500 mb-1.5">System Architecture / Summary</label>
                    <textarea name="description" id="description" required rows="4" class="w-full border border-neutral-200 p-3 rounded-none focus:outline-none focus:border-neutral-900 resize-none">{{ old('description') }}</textarea>
                </div>
                <div>
                <label for="image" class="block uppercase tracking-wider font-medium text-neutral-500 mb-1.5">Project Photo / Thumbnail</label>
                <input type="file" name="image" id="image" accept="image/*" class="w-full border border-neutral-200 p-2.5 rounded-none focus:outline-none focus:border-neutral-900 file:mr-4 file:py-1.5 file:px-3 file:border-0 file:text-xs file:font-semibold file:bg-neutral-900 file:text-white hover:file:bg-neutral-800 file:cursor-pointer" value="{{ old('image_path') }}">
                <p class="text-neutral-400 mt-1 text-[10px]">Format: JPG, PNG, or WEBP. Max 2MB.</p>
            </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-neutral-100">
                    <button type="button" onclick="document.getElementById('createModal').classList.add('hidden')" class="border border-neutral-200 px-5 py-3 rounded-none hover:bg-neutral-50 transition-colors">Cancel</button>
                    <button type="submit" class="bg-neutral-900 text-white px-6 py-3 rounded-none hover:bg-neutral-800 transition-colors">Commit Entry</button>
                </div>
            </form>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center p-4 z-50 hidden">
        <div class="bg-white max-w-lg w-full p-8 border border-neutral-200 shadow-xl space-y-6">
            <div class="flex justify-between items-center border-b border-neutral-100 pb-4">
                <h3 class="text-base font-semibold uppercase tracking-wider">Modify Deployment</h3>
                <button onclick="document.getElementById('editModal').classList.add('hidden')" class="text-neutral-400 hover:text-neutral-900 text-lg">&times;</button>
            </div>
            <form id="editForm" action="#" method="POST" class="space-y-4 text-xs">
                @csrf
                @method('PUT')
                <div>
                    <label for="edit_title" class="block uppercase tracking-wider font-medium text-neutral-500 mb-1.5">Project Name</label>
                    <input type="text" name="title" id="edit_title" required class="w-full border border-neutral-200 p-3 rounded-none focus:outline-none focus:border-neutral-900">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="edit_tech_stack" class="block uppercase tracking-wider font-medium text-neutral-500 mb-1.5">Tech Stack</label>
                        <input type="text" name="tech_stack" id="edit_tech_stack" required class="w-full border border-neutral-200 p-3 rounded-none focus:outline-none focus:border-neutral-900">
                    </div>
                    <div>
                        <label for="edit_year" class="block uppercase tracking-wider font-medium text-neutral-500 mb-1.5">Year</label>
                        <input type="text" name="year" id="edit_year" required class="w-full border border-neutral-200 p-3 rounded-none focus:outline-none focus:border-neutral-900">
                    </div>
                </div>
                <div>
                    <label for="edit_description" class="block uppercase tracking-wider font-medium text-neutral-500 mb-1.5">System Architecture / Summary</label>
                    <textarea name="description" id="edit_description" required rows="4" class="w-full border border-neutral-200 p-3 rounded-none focus:outline-none focus:border-neutral-900 resize-none"></textarea>
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-neutral-100">
                    <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" class="border border-neutral-200 px-5 py-3 rounded-none hover:bg-neutral-50 transition-colors">Cancel</button>
                    <button type="submit" class="bg-neutral-900 text-white px-6 py-3 rounded-none hover:bg-neutral-800 transition-colors">Updates</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openEditModal(project) {
            const form = document.getElementById('editForm');
            form.action = `/admin/dashboard/project/${project.id}`;

            document.getElementById('edit_title').value = project.title;
            document.getElementById('edit_tech_stack').value = project.tech_stack;
            document.getElementById('edit_year').value = project.year;
            document.getElementById('edit_description').value = project.description || '';

            document.getElementById('editModal').classList.remove('hidden');
        }
    </script>
@endpush
