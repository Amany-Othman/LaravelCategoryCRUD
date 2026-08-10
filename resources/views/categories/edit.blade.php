@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Category</h1>
        <p>Update category information</p>
    </div>
</div>

<div class="form-container">

    @if ($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- update the category with this specific id -->
    <form action="{{ route('category.update', $category->id) }}" method="POST">

        @csrf
        <!--html normally deals with only get and post this allows it to deal with post as put-->
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <!--if there is validation error in another field mtms7sh de lw mfehash moskhla  w lw mkansh feha yb2a el old value-->
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea id="description" name="description"
                rows="5">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="form-group">
            <input type="checkbox" id="status" name="status" value="1" {{ $category->status ? 'checked' : '' }}>

            <label for="status">Visible</label>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Category
        </button>

        <a href="{{ route('category.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection