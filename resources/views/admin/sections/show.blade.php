<!-- sections.show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Section Details</div>

                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $section->id }}</p>
                        <p><strong>Name:</strong> {{ $section->name }}</p>
                        <p><strong>Description:</strong> {{ $section->description ?: 'N/A' }}</p>
                        <p><strong>Start Time:</strong> {{ $section->start_time }}</p>
                        <p><strong>Capacity:</strong> {{ $section->capacity }}</p>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('sections.index') }}" class="btn btn-secondary">Back</a>
                            <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
