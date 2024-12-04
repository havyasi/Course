<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::where('teacher_id', Auth::id())->get();
        return view('dashboard.teacher.content.index', compact('contents'));
    }

    public function create()
    {
        return view('dashboard.teacher.content.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $validated['teacher_id'] = Auth::id();

        Content::create($validated);

        return redirect()->route('teacher.contents.index')->with('success', 'Content created successfully.');
    }

    public function edit($id)
    {
        $content = Content::where('teacher_id', Auth::id())->findOrFail($id);
        return view('dashboard.teacher.content.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $content = Content::where('teacher_id', Auth::id())->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $content->update($validated);

        return redirect()->route('teacher.contents.index')->with('success', 'Content updated successfully.');
    }

    public function destroy($id)
    {
        $content = Content::where('teacher_id', Auth::id())->findOrFail($id);
        $content->delete();

        return redirect()->route('teacher.contents.index')->with('success', 'Content deleted successfully.');
    }
}
