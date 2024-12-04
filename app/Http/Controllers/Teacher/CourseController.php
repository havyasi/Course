<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('teacher_id', Auth::id())->get();
        return view('dashboard.teacher.course.index', compact('courses'));
    }

    public function create()
    {
        return view('dashboard.teacher.course.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // dd($validated);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('course_images', 'public');
             $validated['image'] = $imagePath;
         }

        $validated['teacher_id'] = Auth::id();

        Course::create($validated);

        return redirect()->route('teacher.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = Course::where('teacher_id', Auth::id())->findOrFail($id);
        return view('dashboard.teacher.course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::where('teacher_id', Auth::id())->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('course_images', 'public');
            $validated['image'] = $imagePath;
        }

        $course->update($validated);

        return redirect()->route('dashboard.teacher.course.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::where('teacher_id', Auth::id())->findOrFail($id);
        $course->delete();

        return redirect()->route('teacher.courses.index')->with('success', 'Course deleted successfully.');
    }

    public function participants($id)
    {
        $course = Course::where('teacher_id', Auth::id())->findOrFail($id);
        $participants = $course->participants; // Assuming a relationship is defined in the Course model
        return view('dashboard.teacher.course.participants', compact('course', 'participants'));
    }
}