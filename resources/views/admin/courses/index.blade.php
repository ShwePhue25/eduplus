<!-- courses.index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Level</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Period</th>
                        <th>Announce_date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course_name }}</td>
                            @forelse ($course->categories as $category)
                                <td>{{ $category->name }}</td>
                            @empty
                                <td>No categories found</td>
                            @endforelse
                            @forelse ($course->levels as $level)
                                <td>{{ $level->name }}</td>
                            @empty
                                <td>No Level found</td>
                            @endforelse
                            @forelse ($course->classrooms as $classroom)
                                <td>{{ $classroom->name }}</td>
                            @empty
                                <td>No class found</td>
                            @endforelse
                            @forelse ($course->sections as $section)
                                <td>{{ $section->name }}</td>
                            @empty
                                <td>No section found</td>
                            @endforelse
                            <td>{{ $course->description }}</td>
                            <td>{{ $course->price }}</td>
                            <td>{{ $course->period }}</td>
                            <td>{{ $course->announce_date }}</td>
                            <td>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    </div>
@endsection
