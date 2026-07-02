<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('portofolio.work', compact('projects'));
    }

    // Menampilkan detail proyek berdasarkan slug beserta komentarnya
    public function show($slug)
    {
        // Eager loading relasi rootComments beserta replies-nya untuk menghemat query (anti N+1)
        $project = Project::with(['rootComments.replies'])->where('slug', $slug)->firstOrFail();
        return view('portofolio.show', compact('project'));
    }

    // Menyimpan komentar baru dari publik
    public function storeComment(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        $project->comments()->create($validated);

        return back()->with('success', 'Comment posted successfully.');
    }
}
