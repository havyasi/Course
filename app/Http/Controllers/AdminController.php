<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // 1. Lihat semua pengguna
    public function listUsers()
    {
        $users = User::all();
        return view('dashboard.admin.users.index', compact('users')); // Update view path
    }

    // 2. Tambah pengguna baru
    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:student,teacher',
        ]);

        User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    // 3. Edit pengguna
    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,teacher,student',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users')->with('success', 'User berhasil diperbarui.');
    }

    // 4. Hapus pengguna
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    // 5. Lihat semua kursus
    public function listCourses()
    {
        $courses = Course::with('teacher')->get();
        return view('dashboard.admin.course.index', compact('courses'));
    }

    // 6. Tambah kursus baru
    public function createCourse()
    {
        return view('dashboard.admin.course.create');
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'image' => 'nullable|image|max:10240', // Optional image validation
        ]);
    
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
    
        if ($request->hasFile('image')) {
            $course->image = $request->file('image')->store('course_images', 'public');
        }
    
        $course->save();
    
        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    // 7. Edit kursus
    public function editCourse($id)
    {
        $course = Course::findOrFail($id);
        return view('dashboard.admin.course.edit', compact('course'));
    }

    public function updateCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'teacher_id' => 'required|exists:users,id',
        ]);

        $course->update($request->all());

        return redirect()->route('admin.courses.index')->with('success', 'Kursus berhasil diperbarui.');
    }

    // 8. Hapus kursus
    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.course')->with('success', 'Kursus berhasil dihapus.');
    }

    public function home()
    {
        $courses = Course::with('teacher')->get();
        return view('dashboard.admin.home', compact('courses'));
    }
}

