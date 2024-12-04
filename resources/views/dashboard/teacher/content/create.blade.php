<!-- filepath: /e:/project/tesapp/course-project/resources/views/dashboard/teacher/content/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Content</h1>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group mb-3">
            <label for="body">Content</label>
            <textarea class="form-control" id="body" name="body" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Content</button>
    </form>
</div>
@endsection