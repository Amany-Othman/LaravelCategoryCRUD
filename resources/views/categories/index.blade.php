@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<div class="page-header">
    <div>
        <h1>Categories</h1>
        <p>Manage your categories</p>
    </div>

    <a href="{{ route('category.create') }}" class="btn btn-primary">
        Add Category
    </a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <!--forelse : if there is no categories to show 
             it will display no categories found instead of nothing like in foreach
            --->
            @forelse ($categories as $category) <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>

                <td>
                    @if ($category->status)
                    <span class="status active">Visible</span>
                    @else
                    <span class="status inactive">Hidden</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('category.show', $category->id) }}">
                        View
                    </a>

                    <a href="{{ route('category.edit', $category->id) }}">
                        Edit
                    </a>

                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
                <td colspan="5">
                    No categories found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $categories->links() }}
</div>

@endsection