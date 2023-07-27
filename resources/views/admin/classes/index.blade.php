<!-- classes.index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Classes</div>

                    <div class="card-body">
                        <a href="{{ route('classes.create') }}" class="btn btn-primary mb-2">Add Class</a>

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
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Capacity</th>
                                    <!-- Add more columns for other class attributes if needed -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classes as $class)
                                    <tr>
                                        <td>{{ $class->id }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->description }}</td>
                                        <td>{{ $class->start_date }}</td>
                                        <td>{{ $class->end_date }}</td>
                                        <td>{{ $class->capacity }}</td>
                                        <td>
                                            <a href="{{ route('classes.show', $class->id) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-sm btn-success">Edit</a>

                                            <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this class?')">Delete</button>
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
