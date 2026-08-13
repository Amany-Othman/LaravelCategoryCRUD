@extends('admin.layouts.app')


@section('title', 'Edit Home Content')


@section('page-heading', 'Edit Home Content')


@section('content')


<div class="card shadow mb-4">


    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-edit mr-2"></i>
            Edit {{ ucfirst(str_replace('_', ' ', $homeContent->field)) }}
        </h6>
    </div>


    <div class="card-body">


        <form action="{{ route('admin.home-contents.update', $homeContent) }}" method="POST">

            @csrf
            @method('PUT')


            {{-- English --}}
            <div class="form-group">
                <label for="value_en">English</label>

                <input type="text" name="value_en" id="value_en" class="form-control"
                    value="{{ old('value_en', $homeContent->value_en) }}" required>
            </div>


            {{-- Arabic --}}
            <div class="form-group">
                <label for="value_ar">Arabic</label>

                <input type="text" name="value_ar" id="value_ar" class="form-control"
                    value="{{ old('value_ar', $homeContent->value_ar) }}" dir="rtl" required>
            </div>


            {{-- Link --}}
            @if ($homeContent->field === 'button')

            <div class="form-group">
                <label for="link">Button Link</label>

                <input type="text" name="link" id="link" class="form-control"
                    value="{{ old('link', $homeContent->link) }}">
            </div>

            @endif


            <div class="mt-4">

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i>
                    Update
                </button>

                <a href="{{ route('admin.home-contents.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </div>


        </form>


    </div>


</div>


@endsection