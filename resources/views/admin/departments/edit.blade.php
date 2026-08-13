@extends('admin.layouts.app')
@section('title', 'Edit Department')

@section('page-heading', 'Edit Department')

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Edit Department
        </h6>
    </div>

    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.departments.update', $department->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name_en">
                    Department Name (English)
                </label>

                <input type="text" name="name_en" id="name_en" class="form-control"
                    value="{{ old('name_en', $department->name_en) }}" required>
            </div>

            <div class="form-group">
                <label for="name_ar">
                    Department Name (Arabic)
                </label>

                <input type="text" name="name_ar" id="name_ar" class="form-control"
                    value="{{ old('name_ar', $department->name_ar) }}" dir="rtl" required>
            </div>

            <div class="form-group">
                <label for="description_en">
                    Description (English)
                </label>

                <textarea name="description_en" id="description_en" class="form-control"
                    rows="4">{{ old('description_en', $department->description_en) }}</textarea>
            </div>

            <div class="form-group">
                <label for="description_ar">
                    Description (Arabic)
                </label>

                <textarea name="description_ar" id="description_ar" class="form-control" rows="4"
                    dir="rtl">{{ old('description_ar', $department->description_ar) }}</textarea>
            </div>

            <div class="form-group">
                <label for="icon">
                    Icon
                </label>

                <input type="text" name="icon" id="icon" class="form-control"
                    value="{{ old('icon', $department->icon) }}">
            </div>

            <div class="form-group">
                <label for="image">
                    Image
                </label>

                <input type="text" name="image" id="image" class="form-control"
                    value="{{ old('image', $department->image) }}">
            </div>

            <div class="form-group">
                <label for="status">
                    Status
                </label>

                <select name="status" id="status" class="form-control">

                    <option value="1" {{ old('status', $department->status) == '1' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0" {{ old('status', $department->status) == '0' ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Update Department
            </button>

            <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection