@extends('admin.layouts.app')

@section('title', 'Product Details')

@section('page-heading', 'Product Details')

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Product Details
        </h6>
    </div>

    <div class="card-body">

        <div class="mb-3">
            <strong>ID:</strong>
            {{ $product->id }}
        </div>

        <div class="mb-3">
            <strong>Name:</strong>
            {{ $product->name }}
        </div>

        <div class="mb-3">
            <strong>Description:</strong>
            {{ $product->description }}
        </div>

        <div class="mb-3">
            <strong>Price:</strong>
            {{ $product->price }}
        </div>

        <div class="mb-3">
            <strong>Status:</strong>
            <span class="badge {{ $product->status == 'active' ? 'badge-success' : 'badge-secondary' }}">
                {{ ucfirst($product->status) }}
            </span>
        </div>

        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
            Edit
        </a>

        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            Back
        </a>

    </div>

</div>

@endsection