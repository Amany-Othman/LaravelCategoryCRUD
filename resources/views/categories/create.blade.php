@extends('layouts.app')

@section('title', 'Create Category')

@section('content')

<div class="page-header">
    <div>
        <h1>Create Category</h1>
        <p>Add a new category</p>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-error">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="form-container">

    <form action="{{ route('category.store') }}" method="POST">
        <!--  token-->
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <!-- lw 7sl validation problem mn ay field ghero hyrg3 hwa bl value ely kant already feh-->
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <input type="checkbox" id="status" name="status" value="1" checked>

            <label for="status">Visible</label>
        </div>

        <button type="submit" class="btn btn-primary">
            Create Category
        </button>

        <a href="{{ route('category.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection