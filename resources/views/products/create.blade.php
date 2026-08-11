@extends('layouts.app')

@section('title', 'Create Product')

@section('content')

<div class="page-header">
    <div>
        <h1>Create Product</h1>
        <p>Add a new product</p>
    </div>

    <a href="{{ route('products.index') }}" class="btn">
        Back to Products
    </a>
</div>

<div class="form-container">
    <!-- when we press create product el form h tb3t el data ll route bta3 products.store-->
    <form action="{{ route('products.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="name">Name</label>

            <input type="text" id="name" name="name" value="{{ old('name') }}">

            @error('name')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>

            @error('description')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>

            <input type="number" id="price" name="price" step="0.01" value="{{ old('price') }}">

            @error('price')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <input type="checkbox" id="status" name="status" value="1" {{ old('status', 1) ? 'checked' : '' }}>

            <label for="status">Visible</label>
        </div>

        <button type="submit" class="btn btn-primary">
            Create Product
        </button>

    </form>

</div>

@endsection