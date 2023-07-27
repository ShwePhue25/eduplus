<!-- classes.show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Class Details</div>

                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $class->id }}</p>
                        <p><strong>Name:</strong> {{ $class->name }}</p>
                        <p><strong>Description:</strong> {{ $class->description }}</p>
                        <p><strong>Start Date:</strong> {{ $class->start_date }}</p>
                        <p><strong>End Date:</strong> {{ $class->end_date }}</p>
                        <p><strong>Capacity:</strong> {{ $class->capacity }}</p>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('classes.index') }}" class="btn btn-secondary">Back</a>
                            <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
