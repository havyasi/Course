@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 animate-gradient-slow">
    <!-- Floating Elements -->
    <div class="absolute top-0 right-0 -mt-16 -mr-16 w-96 h-96 bg-blue-400/10 rounded-full blur-3xl animate-blob"></div>
    <div class="absolute bottom-0 left-0 -mb-16 -ml-16 w-96 h-96 bg-purple-400/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <!-- Header with Animation -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 animate-gradient-x mb-4">
                Create Amazing Course
            </h1>
            <p class="text-gray-600 text-lg animate-fade-in-up">Share your knowledge and inspire others</p>
            <div class="mt-4 flex justify-center space-x-2">
                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm animate-bounce-in delay-100">Interactive</span>
                <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full text-sm animate-bounce-in delay-200">Engaging</span>
                <span class="inline-block px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-sm animate-bounce-in delay-300">Professional</span>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-3xl overflow-hidden border border-gray-100 transform hover:scale-[1.01] transition-all duration-300">
            <div class="p-8">
                <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    
                    <!-- Course Title -->
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-indigo-600 transition-colors duration-200">Course Title</label>
                        <div class="relative">
                            <input type="text" name="name" 
                                   class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white hover:bg-white"
                                   placeholder="Enter an engaging course title..."
                                   required>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Course Description -->
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-indigo-600 transition-colors duration-200">Description</label>
                        <textarea name="description" rows="4" 
                                  class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white hover:bg-white resize-none"
                                  placeholder="Describe what students will learn..."
                                  required></textarea>
                    </div>

                    <!-- Date Range with Modern Calendar UI -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-indigo-600 transition-colors duration-200">Start Date</label>
                            <div class="relative">
                                <input type="date" name="start_date"
                                       class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white hover:bg-white"
                                       required>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-indigo-600 transition-colors duration-200">End Date</label>
                            <div class="relative">
                                <input type="date" name="end_date"
                                       class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white hover:bg-white"
                                       required>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Course Image Upload -->
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-indigo-600 transition-colors duration-200">Course Cover Image</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-300 rounded-xl hover:border-indigo-500 transition-colors duration-200">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-indigo-500 transition-colors duration-200" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label class="relative cursor-pointer rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span class="hover:underline">Upload a file</span>
                                        <input type="file" name="image" class="sr-only" accept="image/*">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG up to 10MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" 
                                class="group relative inline-flex items-center px-8 py-3 overflow-hidden rounded-xl bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-white font-semibold shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-200">
                            <span class="relative z-10 flex items-center">
                                <svg class="w-5 h-5 mr-2 transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Create Course
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-gradient-x"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    25% { transform: translate(20px, -50px) scale(1.1); }
    50% { transform: translate(-20px, 20px) scale(0.9); }
    75% { transform: translate(20px, 50px) scale(0.95); }
}

@keyframes gradient-x {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 15s ease infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animate-bounce-in {
    animation: bounceIn 0.5s ease-out;
}

@keyframes bounceIn {
    0% { transform: scale(0.3); opacity: 0; }
    50% { transform: scale(1.05); opacity: 0.8; }
    100% { transform: scale(1); opacity: 1; }
}

.delay-100 { animation-delay: 0.1s; }
.delay-200 { animation-delay: 0.2s; }
.delay-300 { animation-delay: 0.3s; }
</style>
@endsection