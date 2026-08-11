@extends('layouts.app')

@section('title', 'Product Details')

@section('content')

<div class="page-header">
    <div>
        <h1>Product Details</h1>
        <p>View product information</p>
    </div>

    <a href="{{ route('products.index') }}" class="btn">
        Back to Products
    </a>
</div>

<div class="product-details">

    <p>
        <strong>ID:</strong>
        {{ $product->id }}
    </p>

    <p>
        <strong>Name:</strong>
        {{ $product->name }}
    </p>

    <p>
        <strong>Description:</strong>
        {{ $product->description }}
    </p>

    <p>
        <strong>Price:</strong>
        {{ $product->price }}
    </p>

    <p>
        <strong>Status:</strong>

        @if ($product->status)
        <span class="status active">Visible</span>
        @else
        <span class="status inactive">Hidden</span>
        @endif
    </p>

</div>

@endsection