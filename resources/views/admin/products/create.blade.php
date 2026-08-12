@extends('admin.layouts.app')

@section('title', 'Create Product')

@section('page-heading', 'Create Product')

@section('content')

<div class="card shadow mb-4">

    {{-- Card Header --}}
    <div class="card-header py-3 product-card-header">

        <h6 class="m-0">
            Create New Product
        </h6>

    </div>


    <div class="card-body">

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
            class="product-form">

            @csrf


            {{-- Product Name --}}
            <div class="form-group">

                <label>Name</label>

                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
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
                    required>{{ old('description') }}</textarea>

                @error('description')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror

            </div>


            {{-- Product Price --}}
            <div class="form-group">

                <label>Price</label>

                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}"
                    placeholder="Enter product price" required>

                @error('price')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror

            </div>


            {{-- Product Image --}}
            <div class="form-group">

                <label>Product Image</label>

                <div id="image-drop-zone">

                    <div class="upload-icon">
                        <i class="fas fa-cloud-upload-alt fa-3x"></i>
                    </div>

                    <div class="upload-title">
                        Drag & Drop your image here
                    </div>

                    <div class="upload-text">
                        or click to choose an image
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


            {{-- Buttons --}}
            <button type="submit" class="btn btn-primary">
                Create Product
            </button>

            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>


@endsection