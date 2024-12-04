<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all(); // Menampilkan semua kursus
        return view('student.courses.index', compact('courses'));
    }

    public function join(Course $course)
    {
        $student = auth()->user();
        $student->courses()->attach($course->id); // Menambahkan kursus ke student
        return redirect()->route('student.dashboard')->with('success', 'Anda berhasil mengikuti kursus ini.');
    }
}

