@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('page-heading', 'Edit Product')

@section('content')

<div class="card shadow mb-4">

    {{-- Card Header --}}
    <div class="card-header py-3 product-card-header">

        <h6 class="m-0">
            Edit Product
        </h6>

    </div>


    <div class="card-body">

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data"
            class="product-form">

            @csrf
            @method('PUT')


            {{-- Product Name --}}
            <div class="form-group">

                <label>Name</label>

                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}"
                    placeholder="Enter product name" required>

                @error('name')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror

            </div>


            {{-- Product Description --}}
            <div class="form-group">

                <label>Description</label>

                <textarea name="description" class="form-control" rows="4" placeholder="Enter product description"
                    required>{{ old('description', $product->description) }}</textarea>

                @error('description')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror

            </div>


            {{-- Product Price --}}
            <div class="form-group">

                <label>Price</label>

                <input type="number" step="0.01" name="price" class="form-control"
                    value="{{ old('price', $product->price) }}" placeholder="Enter product price" required>

                @error('price')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror

            </div>


            {{-- Product Image --}}
            <div class="form-group">

                <label>Product Image</label>

                {{-- Current Image --}}
                @if ($product->image)
                <div class="mb-3">

                    <small class="d-block font-weight-bold text-muted mb-2">
                        Current Image
                    </small>

                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="current-image">

                </div>
                @endif


                {{-- New Image Drop Zone --}}
                <div id="image-drop-zone">

                    <div class="upload-icon">
                        <i class="fas fa-cloud-upload-alt fa-3x"></i>
                    </div>

                    <div class="upload-title">
                        Drag & Drop your new image here
                    </div>

                    <div class="upload-text">
                        or click to choose a new image
                    </div>

                    <div class="upload-info">
                        PNG, JPG or JPEG
                    </div>

                    <input type="file" name="image" id="image-input" accept="image/*" hidden>

                    <div id="image-preview" class="mt-4"></div>

                </div>

                @error('image')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror

            </div>


            {{-- Status --}}
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

                @error('status')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror

            </div>


            {{-- Buttons --}}
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