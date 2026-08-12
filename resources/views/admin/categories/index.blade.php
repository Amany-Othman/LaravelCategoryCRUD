@extends('admin.layouts.app')

@section('title', 'Categories')

@section('page-heading', 'Categories')

@section('content')

<div class="card shadow mb-4">


    <div class="card-header py-3">
        <div class="d-flex justify-content-between align-items-center">

            <h6 class="m-0 font-weight-bold text-primary">
                Categories
            </h6>

            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Add Category
            </a>

        </div>
    </div>

    <div class="card-body">

        <p>Total Categories: {{ $categories->count() }}</p>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($categories as $category)

                <tr>

                    <td>{{ $category->id }}</td>

                    <td>{{ $category->name }}</td>

                    <td>{{ $category->description }}</td>

                    <td>
                        @if ($category->status)
                        <span class="badge badge-success">
                            Active
                        </span>
                        @else
                        <span class="badge badge-secondary">
                            Inactive
                        </span>
                        @endif
                    </td>

                    <td>

                        <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this category?')">
                                <i class="fas fa-trash"></i>
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>


</div>

@endsection