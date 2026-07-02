<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class PCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
        'project_id' => 'required|exists:projects,id',
        'name' => 'required|string|max:225',
        'comment' => 'required|string',
     ]);

        Comment::create([
        'projects_id' => $request->project_id,
        'name' => $request->name,
        'comment' => $request->comment,
     ]);

     return redirect()->back()->with('success', 'comment successfully added');
    }
}
