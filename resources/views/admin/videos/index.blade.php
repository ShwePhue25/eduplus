<!-- resources/views/videos/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Videos</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <ul class="list-group">
                        @foreach ($videos as $video)
                        <li class="list-group-item">
                            <h5>{{ $video->title }}</h5>
                            <p>Duration: {{ $video->duration }} seconds</p>
                            <p>Categories:
                                @foreach ($video->categories as $category)
                                {{ $category->name }},
                                @endforeach
                            </p>
                            {{-- <p>Uploader: {{ $video->user->name }}</p> --}}
                            <video width="320" height="240" controls>
                                <source src="{{ $video->url }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
