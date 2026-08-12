@extends('admin.layouts.app')

@section('title', 'Product Details')

@section('page-heading', 'Product Details')

@section('content')

<div class="card shadow mb-4 product-form-card">

    {{-- Card Header --}}
    <div class="card-header py-3 product-card-header">

        <h6 class="m-0">
            <i class="fas fa-box mr-2"></i>
            Product Details
            <span class="product-id-badge">#{{ $product->id }}</span>
        </h6>

        <p class="header-subtitle">
            View the full details for this product.
        </p>

    </div>


    <div class="card-body product-details">

        {{-- Row 1: Name + Price --}}
        <div class="form-row">

            {{-- Product Name --}}
            <div class="form-group col-md-8">

                <label>Name</label>

                <div class="detail-box">
                    {{ $product->name }}
                </div>

            </div>


            {{-- Product Price --}}
            <div class="form-group col-md-4">

                <label>Price</label>

                <div class="detail-box">
                    ${{ number_format($product->price, 2) }}
                </div>

            </div>

        </div>


        {{-- Row 2: Description + Status --}}
        <div class="form-row">

            {{-- Product Description --}}
            <div class="form-group col-md-8">

                <label>Description</label>

                <div class="detail-box detail-box-tall">
                    {{ $product->description }}
                </div>

            </div>


            {{-- Product Status --}}
            <div class="form-group col-md-4 status-field">

                <label>Status</label>

                <div class="status-toggle-box">

                    @if ($product->status === 'active')

                    <span class="status-badge status-active">
                        Active
                    </span>

                    @else

                    <span class="status-badge status-inactive">
                        Inactive
                    </span>

                    @endif

                </div>

            </div>

        </div>


        {{-- Product Image --}}
        <div class="form-group">

            <label>Product Image</label>

            @php
            $imageUrl = $product->getFirstMediaUrl('products');
            @endphp

            @if ($imageUrl)

            <div>
                <img src="{{ $imageUrl }}" alt="{{ $product->name }}" class="product-image">
            </div>

            @else

            <div class="no-image-placeholder">
                <i class="fas fa-image"></i>
                No image available
            </div>

            @endif

        </div>


        {{-- Buttons --}}
        <div class="mt-4">

            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                <i class="fas fa-edit mr-1"></i>
                Edit
            </a>

        </div>

    </div>

</div>

@endsection