@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="page-header">
    <div>
        <h1>Products</h1>
        <p>Manage your products</p>
    </div>

    <a href="{{ route('products.create') }}" class="btn btn-primary">
        Add Product
    </a>
</div>

<div class="table-container">

    <table>
        <thead>
            <tr>
                <th>ID</th>
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
                <td>{{ $product->id }}</td>

                <td>{{ $product->name }}</td>

                <td>{{ $product->description }}</td>

                <td>{{ $product->price }}</td>

                <td>
                    @if ($product->status)
                    <span class="status active">Visible</span>
                    @else
                    <span class="status inactive">Hidden</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('products.show', $product->id) }}">
                        View
                    </a>

                    <a href="{{ route('products.edit', $product->id) }}">
                        Edit
                    </a>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>

            @empty

            <tr>
                <td colspan="6">
                    No products found.
                </td>
            </tr>

            @endforelse

        </tbody>
    </table>

</div>

@endsection