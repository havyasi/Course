<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Pastikan ini diimpor
use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            // Jika pengguna belum login, arahkan ke halaman login
            return redirect('login');
        }

        // Dapatkan peran pengguna
        $role = Auth::user()->role;

        // Arahkan berdasarkan peran
        if ($role == 'admin') {
            // Ambil semua data pengguna untuk admin
            $users = User::all();
            $courses = Course::with('teacher')->get(); // Menambahkan ini

            // Kirim data ke view
            return view('dashboard.admin.home', compact('users', 'courses')); // Mengirim $courses ke view
        } elseif ($role == 'teacher') {
            return $this->teacherHome();
        }

        $student = Auth::user();
        if (!$student) {
            return redirect()->route('login');
        }
        $enrolledCourses = $student->enrolledCourses; 
        $allCourses = Course::all(); 

        // Default untuk user biasa
        return view('dashboard.student.dashboard',compact('enrolledCourses', 'allCourses'));
    }

    public function teacherHome()
    {
        $allCourses = Course::with('teacher')->get();
        $yourCourses = Course::where('teacher_id', Auth::id())->get();
        $availableCourses = Course::where('teacher_id', '!=', Auth::id())->get();
        return view('dashboard.teacher.home', compact('allCourses','yourCourses', 'availableCourses'));
    }
}
