<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CMSController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.dashboard', compact('projects'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            // 'category' => 'required|string|max:255',
            'tech_stack' => 'required|string',
            'year' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
        }

        Project::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title), 
            'tech_stack'   => $request->tech_stack,
            'year'         => $request->year,
            'description'  => $request->description,
            'image_path'   => $path,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Successfully deployed.');
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            // 'category' => 'required|string|max:255',
            'tech_stack' => 'required|string',
            'year' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // if ($request->hasFile('image')) {
        //     // Hapus gambar lama jika ada gambar baru yang diunggah
        //     if ($project->image_path) {
        //         Storage::disk('public')->delete($project->image_path);
        //     }
        //     $validated['image_path'] = $request->file('image')->store('projects', 'public');
        // }

        $project->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Deployment updated.');
    }

    public function destroy(Project $project)
    {
        if ($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Successfully deleted.');
    }
}
