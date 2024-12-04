@extends('layouts.app')

@section('content')
<h1>{{ $lesson->title }}</h1>
<p>{{ $lesson->content }}</p>

<form action="{{ route('student.lessons.mark_done', $lesson->id) }}" method="POST">
    @csrf
    <button type="submit">Mark as Done</button>
</form>

<a href="{{ route('student.course.nextLesson', [$course->id, $lesson->id]) }}" class="btn btn-primary">Lanjutkan</a>
@endsection
