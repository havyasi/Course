<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\CourseController as TeacherCourseController;
use App\Http\Controllers\Teacher\ContentController as TeacherContentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('home', [AdminController::class, 'home'])->name('home');
    // Route User Management
    Route::get('users', [AdminController::class, 'listUsers'])->name('users'); // Menampilkan daftar pengguna
    Route::post('users', [AdminController::class, 'createUser'])->name('users.create'); // Membuat pengguna baru
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // Form edit pengguna
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update'); // Update pengguna
    Route::delete('users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete'); // Hapus pengguna

    // Route Course Management
    Route::resource('courses', CourseController::class)->names([
        'index' => 'courses.index',
        'create' => 'courses.create',
        'store' => 'courses.store',
        'show' => 'courses.show',
        'edit' => 'courses.edit',
        'update' => 'courses.update',
        'destroy' => 'courses.destroy',
    ]);
});

Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('home', [HomeController::class, 'teacherHome'])->name('home');

    // Routes for Teacher Course Management
    Route::get('courses', [TeacherCourseController::class, 'index'])->name('courses.index');
    Route::get('courses/create', [TeacherCourseController::class, 'create'])->name('courses.create');
    Route::post('courses', [TeacherCourseController::class, 'store'])->name('courses.store');
    Route::get('courses/{id}/edit', [TeacherCourseController::class, 'edit'])->name('courses.edit');
    Route::put('courses/{id}', [TeacherCourseController::class, 'update'])->name('courses.update');
    Route::delete('courses/{id}', [TeacherCourseController::class, 'destroy'])->name('courses.destroy');
    Route::get('courses/{id}/participants', [TeacherCourseController::class, 'participants'])->name('courses.participants');

    // Routes for Teacher Content Management
    Route::get('contents', [TeacherContentController::class, 'index'])->name('contents.index');
    Route::get('contents/create', [TeacherContentController::class, 'create'])->name('contents.create');
    Route::post('contents', [TeacherContentController::class, 'store'])->name('contents.store');
    Route::get('contents/{id}/edit', [TeacherContentController::class, 'edit'])->name('contents.edit');
    Route::put('contents/{id}', [TeacherContentController::class, 'update'])->name('contents.update');
    Route::delete('contents/{id}', [TeacherContentController::class, 'destroy'])->name('contents.destroy');
});

Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Student\DashboardController::class, 'index'])->name('dashboard');
    Route::get('courses', [\App\Http\Controllers\Student\CourseController::class, 'index'])->name('courses.index');
    Route::post('courses/{course}/join', [\App\Http\Controllers\Student\CourseController::class, 'join'])->name('courses.join');
    Route::get('courses/{course}/lessons', [\App\Http\Controllers\Student\LessonController::class, 'index'])->name('courses.lessons');
    Route::post('lessons/{lesson}/mark-done', [\App\Http\Controllers\Student\LessonController::class, 'markDone'])->name('lessons.mark_done');
    Route::post('courses/{course}/progress', [StudentController::class, 'markAsDone'])->name('markAsDone');
});

require __DIR__.'/auth.php';
