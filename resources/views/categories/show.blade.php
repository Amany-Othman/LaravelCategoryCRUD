@extends('layouts.app')

@section('title', 'Category Details')

@section('content')

<div class="page-header">
    <div>
        <h1>Category Details</h1>
        <p>View category information</p>
    </div>
</div>

<div class="details-container">

    <div class="detail-row">
        <span class="detail-label">ID</span>
        <span>{{ $category->id }}</span>
    </div>

    <div class="detail-row">
        <span class="detail-label">Name</span>
        <span>{{ $category->name }}</span>
    </div>

    <div class="detail-row">
        <span class="detail-label">Description</span>
        <span>{{ $category->description }}</span>
    </div>

    <div class="detail-row">
        <span class="detail-label">Status</span>

        @if ($category->status)
        <span class="status active">Visible</span>
        @else
        <span class="status inactive">Hidden</span>
        @endif
    </div>

    <div class="detail-row">
        <span class="detail-label">Created At</span>
        <span>{{ $category->created_at->format('M d, Y') }}</span>
    </div>

    <div class="detail-row">
        <span class="detail-label">Last Updated</span>
        <span>{{ $category->updated_at->format('M d, Y') }}</span>
    </div>

    <div class="detail-actions">
        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">
            Edit
        </a>

        <a href="{{ route('category.index') }}" class="btn btn-secondary">
            Back to Categories
        </a>
    </div>

</div>

@endsection