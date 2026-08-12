@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('page-heading', 'Edit Product')

@section('content')

<div class="card shadow mb-4 product-form-card">

    {{-- Card Header --}}
    <div class="card-header py-3 product-card-header">

        <h6 class="m-0">
            <i class="fas fa-edit mr-2"></i>
            Edit Product
        </h6>

        <p class="header-subtitle">
            Update the details below and save your changes.
        </p>

    </div>


    <div class="card-body">

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data"
            class="product-form">

            @csrf
            @method('PUT')


            {{-- Row 1: Name + Price --}}
            <div class="form-row">

                {{-- Product Name --}}
                <div class="form-group col-md-8">

                    <label>Name</label>

                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}"
                        placeholder="Enter product name" required>

                    @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>


                {{-- Product Price --}}
                <div class="form-group col-md-4">

                    <label>Price</label>

                    <input type="number" step="0.01" name="price" class="form-control"
                        value="{{ old('price', $product->price) }}" placeholder="0.00" required>

                    @error('price')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>

            </div>


            {{-- Row 2: Description + Status --}}
            <div class="form-row">

                {{-- Product Description --}}
                <div class="form-group col-md-8">

                    <label>Description</label>

                    <textarea name="description" class="form-control" rows="4" placeholder="Enter product description"
                        required>{{ old('description', $product->description) }}</textarea>

                    @error('description')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>


                {{-- Product Status --}}
                <div class="form-group col-md-4 status-field">

                    <label>Status</label>

                    <div class="status-toggle-box">

                        <div class="custom-control custom-switch product-status-switch">

                            <input type="hidden" name="status" value="inactive">

                            <input type="checkbox" class="custom-control-input" id="statusSwitch" value="active"
                                {{ old('status', $product->status) == 'active' ? 'checked' : '' }}>

                            <label class="custom-control-label" for="statusSwitch">
                                <span class="status-switch-text">Active</span>
                            </label>

                        </div>

                        <p class="status-toggle-hint">
                            Visible to customers in your store
                        </p>

                    </div>

                    @error('status')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>

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

                    <div class="upload-icon-circle">
                        <i class="fas fa-cloud-upload-alt"></i>
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


            {{-- Buttons --}}
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-check mr-1"></i>
                Update Product
            </button>

        </form>

    </div>

</div>

@endsection