@extends('admin.layouts.app')

@section('title', 'Create Product')

@section('page-heading', 'Create Product')

@section('content')

<div class="card shadow mb-4 product-form-card">

    {{-- Card Header --}}
    <div class="card-header py-3 product-card-header">

        <h6 class="m-0">
            <i class="fas fa-box-open mr-2"></i>
            Create New Product
        </h6>

        <p class="header-subtitle">
            Fill in the details below to add a new product to your catalog.
        </p>

    </div>


    <div class="card-body">

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
            class="product-form">

            @csrf


            {{-- Row 1: Name + Price --}}
            <div class="form-row">

                {{-- Product Name --}}
                <div class="form-group col-md-8">

                    <label>Name</label>

                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
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

                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}"
                        placeholder="0.00" required>

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
                        required>{{ old('description') }}</textarea>

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
                                {{ old('status', 'active') == 'active' ? 'checked' : '' }}>

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

                <div id="image-drop-zone">

                    <div class="upload-icon-circle">
                        <i class="fas fa-cloud-upload-alt"></i>
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
                <i class="fas fa-check mr-1"></i>
                Create Product
            </button>

        </form>

    </div>

</div>


@endsection