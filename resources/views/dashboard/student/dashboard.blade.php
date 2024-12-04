@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 animate-gradient-x mb-2">
                Welcome Back, {{ Auth::user()->name }}!
            </h1>
            <p class="text-gray-600">Continue your learning journey</p>
        </div>

        <!-- Learning Progress -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-800">Enrolled Courses</h2>
                        <p class="text-3xl font-bold text-indigo-600">{{ $enrolledCourses->count() }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-800">Completed</h2>
                        <p class="text-3xl font-bold text-green-600">{{ $enrolledCourses->where('pivot.progress', 100)->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-800">In Progress</h2>
                        <p class="text-3xl font-bold text-purple-600">{{ $enrolledCourses->where('pivot.progress', '<', 100)->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enrolled Courses -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 mb-8">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">My Courses</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse ($enrolledCourses as $course)
                        <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-200">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $course->title }}</h3>
                                <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm">
                                    {{ $course->pivot->progress }}%
                                </span>
                            </div>
                            <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                            
                            <!-- Progress Bar -->
                            <div class="relative pt-1">
                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                                    <div style="width:{{ $course->pivot->progress }}%" 
                                         class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-500 transition-all duration-500"></div>
                                </div>
                            </div>

                            <form action="{{ route('student.markAsDone', $course->id) }}" method="POST" class="mt-4">
                                @csrf
                                <div class="flex space-x-2">
                                    <input type="number" name="progress" min="0" max="100" 
                                           class="block w-24 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                           placeholder="0-100%">
                                    <button type="submit" 
                                            class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                                        Update Progress
                                    </button>
                                </div>
                            </form>
                        </div>
                    @empty
                        <div class="col-span-2 text-center py-12">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <p class="text-gray-500">No courses enrolled yet. Browse available courses below.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Available Courses -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Available Courses</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($allCourses as $course)
                        <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-200">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $course->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($course->start_date)->format('M d, Y') }}
                                </span>
                                <form id="join-course-form-{{ $course->id }}" 
                                      action="{{ route('student.courses.join', $course->id) }}" 
                                      method="POST">
                                    @csrf
                                    <button type="submit" 
                                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200">
                                        Join Course
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 15s ease infinite;
}

@keyframes gradient-x {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
</style>
@endsection