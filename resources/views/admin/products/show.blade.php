@extends('admin.layouts.app')

@section('title', 'Product Details')

@section('page-heading', 'Product Details')

@section('content')

<div class="card shadow mb-4">

    {{-- Card Header --}}
    <div class="card-header py-3 product-card-header">

        <h6 class="m-0">
            Product Details
        </h6>

    </div>


    <div class="card-body product-details">

        {{-- Product ID --}}
        <div class="form-group">

            <label>ID</label>

            <div class="detail-box">
                {{ $product->id }}
            </div>

        </div>


        {{-- Product Name --}}
        <div class="form-group">

            <label>Name</label>

            <div class="detail-box">
                {{ $product->name }}
            </div>

        </div>


        {{-- Product Description --}}
        <div class="form-group">

            <label>Description</label>

            <div class="detail-box">
                {{ $product->description }}
            </div>

        </div>


        {{-- Product Price --}}
        <div class="form-group">

            <label>Price</label>

            <div class="detail-box">
                {{ $product->price }}
            </div>

        </div>


        {{-- Product Image --}}
        <div class="form-group">

            <label>Product Image</label>

            @if ($product->image)

            <div>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
            </div>

            @else

            <div class="detail-box text-muted">
                No image available
            </div>

            @endif

        </div>


        {{-- Product Status --}}
        <div class="form-group">

            <label>Status</label>

            <div>
                <span class="badge {{ $product->status == 'active' ? 'badge-success' : 'badge-secondary' }}">
                    {{ ucfirst($product->status) }}
                </span>
            </div>

        </div>


        {{-- Buttons --}}
        <div class="mt-4">

            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                Edit
            </a>

            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                Back
            </a>

        </div>

    </div>

</div>

@endsection