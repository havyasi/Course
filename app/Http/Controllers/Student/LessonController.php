<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function index($courseId)
    {
        $lessons = Lesson::where('course_id', $courseId)->get();
        return view('student.lessons.index', compact('lessons'));
    }

    public function markDone(Lesson $lesson)
    {
        $student = auth()->user();
        $student->completedLessons()->attach($lesson->id);
        return back()->with('success', 'Materi berhasil ditandai selesai.');
    }
}
