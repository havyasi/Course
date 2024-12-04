@extends('layouts.app')

@section('content')
<h1>Daftar Kursus</h1>
<ul>
    @foreach ($courses as $course)
        <li>
            <strong>{{ $course->title }}</strong><br>
            {{ $course->description }}<br>
            <form action="{{ route('student.courses.join', $course->id) }}" method="POST">
                @csrf
                <button type="submit">Ikuti Kursus</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
