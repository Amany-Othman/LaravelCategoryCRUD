@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Product</h1>
        <p>Update product information</p>
    </div>

    <a href="{{ route('products.index') }}" class="btn">
        Back to Products
    </a>
</div>

<div class="form-container">
    <!--lma el user y press update ,eb3t el data ll route bta3 products.update  + put method 3shan y3tbr process el post de put -->
    <form action="{{ route('products.update', $product->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>

            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}">

            @error('name')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea id="description" name="description"
                rows="4">{{ old('description', $product->description) }}</textarea>

            @error('description')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>

            <input type="number" id="price" name="price" step="0.01" value="{{ old('price', $product->price) }}">

            @error('price')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <input type="checkbox" id="status" name="status" value="1"
                {{ old('status', $product->status) ? 'checked' : '' }}>

            <label for="status">Visible</label>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Product
        </button>

    </form>

</div>

@endsection