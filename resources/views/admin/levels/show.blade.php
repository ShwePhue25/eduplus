<!-- levels.show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Level Details</div>

                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $level->id }}</p>
                        <p><strong>Name:</strong> {{ $level->name }}</p>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('levels.index') }}" class="btn btn-secondary">Back</a>
                            <a href="{{ route('levels.edit', $level->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
