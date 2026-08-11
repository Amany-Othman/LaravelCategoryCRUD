@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('page-heading', 'Edit Category')

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Edit Category
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.categories.update', $category) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="name">
                    Name
                </label>

                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}"
                    required>

                @error('name')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror

            </div>


            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea name="description" id="description" class="form-control" rows="4"
                    required>{{ old('description', $category->description) }}</textarea>

                @error('description')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror

            </div>


            <div class="form-group">

                <div class="custom-control custom-switch">

                    <input type="checkbox" name="status" value="1" class="custom-control-input" id="status"
                        {{ $category->status ? 'checked' : '' }}>

                    <label class="custom-control-label" for="status">
                        Active
                    </label>

                </div>

            </div>


            <button type="submit" class="btn btn-primary">
                Update Category
            </button>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection