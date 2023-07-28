<!-- teachers.index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Teachers</div>

                    <div class="card-body">
                        <a href="{{route('teachers.create')}}" class="btn btn-primary mb-2">Add Teacher</a>

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
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $t)
                                    <tr>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->name }}</td>
                                        <td>{{ $t->email }}</td>
                                        <td>
                                            <a href="{{ route('teachers.show', $t->id) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('teachers.edit', $t->id) }}" class="btn btn-sm btn-success">Edit</a>
                                            <form action="{{ route('teachers.destroy', $t->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
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
