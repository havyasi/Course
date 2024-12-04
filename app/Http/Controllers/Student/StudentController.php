<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $courses = $user->courses;

        return view('student.dashboard', compact('courses'));
    }

    public function markAsDone(Request $request, $courseId)
    {
        $user = auth()->user();
        $course = $user->courses()->where('course_id', $courseId)->first();

        if ($course) {
            $progress = $request->input('progress', 0);
            $isCompleted = $progress >= 100;

            $user->courses()->updateExistingPivot($courseId, [
                'progress' => $progress,
                'is_completed' => $isCompleted,
            ]);
        }

        return redirect()->route('student.dashboard')->with('success', 'Lesson progress updated.');
    }
}
