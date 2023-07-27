<!-- resources/views/courses/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Course</div>

                    <div class="card-body">
                        <form action="{{ route('courses.update', $course->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="course_name">Course Name:</label>
                                <input type="text" name="course_name" id="course_name" value="{{ $course->course_name }}"
                                    required><br>
                                @error('course_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Select Category:</label>
                                <select name="category_id[]" id="category_id" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($course->categories->contains($category->id)) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select><br>
                            </div>

                            <div class="form-group">
                                <label for="level">Select Level:</label>
                                <select name="level_id[]" id="level_id" multiple>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}"
                                            @if ($course->levels->contains($level->id)) selected @endif>{{ $level->name }}</option>
                                    @endforeach
                                </select><br>
                            </div>

                            <div class="form-group">
                                <label for="class">Select Class:</label>
                                <select name="classroom_id[]" id="classroom_id" multiple>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}" @if(in_array($classroom->id, $course->classrooms->pluck('id')->toArray())) selected @endif>{{ $classroom->name }}</option>
                                    @endforeach
                                </select><br>
                            </div>

                            <div class="form-group">
                                <label for="section">Select Section:</label>
                                <select name="section_id[]" id="section_id" multiple>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}"
                                            @if ($course->sections->contains($section->id)) selected @endif>{{ $section->name }}</option>
                                    @endforeach
                                </select><br>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" required>{{ $course->description }}</textarea><br>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" name="price" id="price" value="{{ $course->price }}"
                                    required><br>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="period">Period:</label>
                                <input type="text" name="period" id="period" value="{{ $course->period }}"
                                    required><br>
                                @error('period')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="announce_date">Announce Date:</label>
                                <input type="date" name="announce_date" id="announce_date"
                                    value="{{ $course->announce_date }}" required><br>
                                @error('announce_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Section</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
