<!-- filepath: /e:/project/tesapp/course-project/resources/views/dashboard/teacher/course/participants.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Participants of {{ $course->name }}</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th> <!-- Kolom baru -->
                <th>Progress</th>
            </tr>
        </thead>
        <tbody>
            @foreach($participants as $participant)
                <tr>
                    <td>{{ $participant->name }}</td>
                    <td>{{ $participant->email }}</td>
                    <td>{{ $participant->phone }}</td> <!-- Data baru -->
                    <td>{{ $participant->pivot->progress }}%</td> <!-- Assuming a pivot table with progress field -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection