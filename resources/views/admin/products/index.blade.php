@extends('admin.layouts.app')

@section('title', 'Products')

@section('page-heading', 'Products')

@section('content')

<div class="card shadow mb-4">

    {{-- Card Header --}}
    <div class="card-header py-3 products-card-header">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h6 class="m-0">
                    <i class="fas fa-box mr-2"></i>
                    Products
                </h6>

                <p class="header-subtitle mb-0">
                    Manage your product catalog
                </p>

            </div>

            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Add Product
            </a>

        </div>

    </div>


    <div class="card-body">

        {{-- Products Count --}}
        <div class="products-count">
            <i class="fas fa-boxes"></i>
            Total Products:
            <strong>{{ $products->count() }}</strong>
        </div>


        {{-- Products Table --}}
        <div class="table-responsive">

            <table class="table table-bordered products-table">

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

                    @forelse ($products as $product)

                    <tr>

                        {{-- ID --}}
                        <td>
                            {{ $product->id }}
                        </td>


                        {{-- Image --}}
                        <td>

                            @if ($product->getFirstMediaUrl('products'))

                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->name }}"
                                class="product-table-image">

                            @else

                            <span class="no-image">
                                No Image
                            </span>

                            @endif

                        </td>


                        {{-- Name --}}
                        <td>
                            {{ $product->name }}
                        </td>


                        {{-- Description --}}
                        <td>
                            <span class="description-cell" title="{{ $product->description }}">
                                {{ $product->description }}
                            </span>
                        </td>


                        {{-- Price --}}
                        <td>
                            <span class="price-cell">
                                ${{ number_format($product->price, 2) }}
                            </span>
                        </td>


                        {{-- Status --}}
                        <td>

                            @if ($product->status === 'active')

                            <span class="status-badge status-active">
                                Active
                            </span>

                            @else

                            <span class="status-badge status-inactive">
                                Inactive
                            </span>

                            @endif

                        </td>


                        {{-- Actions --}}
                        <td>

                            <div class="action-group">

                                {{-- Show --}}
                                <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info btn-sm"
                                    title="View Product">
                                    <i class="fas fa-eye"></i>
                                </a>


                                {{-- Edit --}}
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm"
                                    title="Edit Product">
                                    <i class="fas fa-edit"></i>
                                </a>


                                {{-- Delete --}}
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Product"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="empty-state">

                            <i class="fas fa-box-open"></i>

                            <p>No products found.</p>

                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i>
                                Add your first product
                            </a>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection