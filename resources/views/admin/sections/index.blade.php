<!-- sections.index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sections</div>

                    <div class="card-body">
                        <a href="{{ route('sections.create') }}" class="btn btn-primary mb-2">Add Section</a>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Start Time</th>
                                    <th>Capacity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                    <tr>
                                        <td>{{ $section->id }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>{{ $section->description ?? '-' }}</td>
                                        <td>{{ $section->start_time }}</td>
                                        <td>{{ $section->capacity }}</td>
                                        <td>
                                            <a href="{{ route('sections.show', $section->id) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-sm btn-succes">Edit</a>
                                            <form action="{{ route('sections.destroy', $section->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this section?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
