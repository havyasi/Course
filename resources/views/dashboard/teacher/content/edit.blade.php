<!-- filepath: /e:/project/tesapp/course-project/resources/views/dashboard/teacher/content/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Content</h1>
    <form action="{{ route('teacher.contents.update', $content->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $content->title }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="body">Content</label>
            <textarea class="form-control" id="body" name="body" required>{{ $content->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Content</button>
    </form>
</div>
@endsection