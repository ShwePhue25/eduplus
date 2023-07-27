<!-- resources/views/courses/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $course->course_name }}</h1>
    <p>Description: {{ $course->description }}</p>
    <p>Price: {{ $course->price }}</p>
    <p>Period: {{ $course->period }}</p>
    <p>Announce Date: {{ $course->announce_date }}</p>
    <a href="{{ route('courses.edit', $course->id) }}">Edit</a>
    <form action="{{ route('courses.destroy', $course->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
