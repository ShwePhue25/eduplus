<!-- subcategory.edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Subcategory</div>

                    <div class="card-body">
                        <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="category_id">Select Category</label>
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Subcategory Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $subcategory->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
