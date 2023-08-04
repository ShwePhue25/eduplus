<!-- resources/views/show_image.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Image Details</div>

                    <div class="card-body">
                        <img src="{{ $imageUrl }}" alt="Image">
                    </div>
                    <!-- Display the file using the URL -->
                    <a href="{{ $imageUrl }}" target="_blank">View File</a>
                </div>
            </div>
        </div>
    </div>
@endsection
