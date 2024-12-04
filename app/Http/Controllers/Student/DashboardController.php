<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user();
        if (!$student) {
            return redirect()->route('login');
        }
        $enrolledCourses = $student->enrolledCourses; 
        
        $allCourses = Course::all(); // Semua kursus yang tersedia

        return view('dashboard.student.dashboard', compact('enrolledCourses', 'allCourses'));
    }
}
