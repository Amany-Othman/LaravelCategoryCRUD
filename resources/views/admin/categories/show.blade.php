@extends('admin.layouts.app')

@section('title', 'Category Details')

@section('page-heading', 'Category Details')

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Category Details
        </h6>
    </div>

    <div class="card-body">

        <div class="mb-3">
            <strong>ID:</strong>
            {{ $category->id }}
        </div>

        <div class="mb-3">
            <strong>Name:</strong>
            {{ $category->name }}
        </div>

        <div class="mb-3">
            <strong>Description:</strong>
            {{ $category->description }}
        </div>

        <div class="mb-3">
            <strong>Status:</strong>

            @if ($category->status)
            <span class="badge badge-success">
                Active
            </span>
            @else
            <span class="badge badge-secondary">
                Inactive
            </span>
            @endif

        </div>

        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">
            Edit
        </a>

        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            Back
        </a>

    </div>

</div>

@endsection