@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('page-heading', 'Edit Product')

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Edit Product
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Name</label>

                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-group">
                <label>Description</label>

                <textarea name="description" class="form-control" rows="4"
                    required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Price</label>

                <input type="number" step="0.01" name="price" class="form-control"
                    value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="image" class="form-control">

                @error('image')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status" class="form-control" required>
                    <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>
                        Active
                    </option>
                    <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Update Product
            </button>

            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection