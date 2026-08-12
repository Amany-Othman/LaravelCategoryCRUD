@extends('admin.layouts.app')

@section('title', 'Products')

@section('page-heading', 'Products')

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <div class="d-flex justify-content-between align-items-center">

            <h6 class="m-0 font-weight-bold text-primary">
                Products
            </h6>

            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Add Product
            </a>

        </div>

    </div>

    <div class="card-body">

        <p>Total Products: {{ $products->count() }}</p>

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($products as $product)

                    <tr>

                        <td>{{ $product->id }}</td>

                        <td>
                            @if ($product->getFirstMediaUrl('products'))
                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->name }}"
                                width="80" height="80" style="object-fit: cover;">
                            @else
                            No Image
                            @endif
                        </td>

                        <td>{{ $product->name }}</td>

                        <td>{{ $product->description }}</td>

                        <td>{{ $product->price }}</td>

                        <td>
                            @if ($product->status)
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

                            <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this product?')">
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

</div>

@endsection