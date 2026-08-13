@extends('admin.layouts.app')


@section('title', 'Edit Doctor')


@section('page-heading', 'Edit Doctor')


@section('content')


<div class="card shadow mb-4">


    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-user-md mr-2"></i>
            Edit Doctor
        </h6>
    </div>


    <div class="card-body">


        <form action="{{ route('admin.doctors.update', $doctor) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')


            {{-- English Name --}}
            <div class="form-group">
                <label for="name_en">Name (English)</label>

                <input type="text" name="name_en" id="name_en" class="form-control"
                    value="{{ old('name_en', $doctor->name_en) }}" required>
            </div>


            {{-- Arabic Name --}}
            <div class="form-group">
                <label for="name_ar">Name (Arabic)</label>

                <input type="text" name="name_ar" id="name_ar" class="form-control"
                    value="{{ old('name_ar', $doctor->name_ar) }}" dir="rtl" required>
            </div>


            {{-- English Specialty --}}
            <div class="form-group">
                <label for="specialty_en">Specialty (English)</label>

                <input type="text" name="specialty_en" id="specialty_en" class="form-control"
                    value="{{ old('specialty_en', $doctor->specialty_en) }}" required>
            </div>


            {{-- Arabic Specialty --}}
            <div class="form-group">
                <label for="specialty_ar">Specialty (Arabic)</label>

                <input type="text" name="specialty_ar" id="specialty_ar" class="form-control"
                    value="{{ old('specialty_ar', $doctor->specialty_ar) }}" dir="rtl" required>
            </div>


            {{-- Current Image --}}
            <div class="form-group">
                <label>Current Image</label>

                @if ($doctor->image)
                <div class="mb-3">
                    <img src="{{ asset($doctor->image) }}" alt="{{ $doctor->name_en }}"
                        style="width: 120px; height: 120px; object-fit: cover;">
                </div>
                @else
                <p class="text-muted">No image available.</p>
                @endif
            </div>


            {{-- New Image --}}
            <div class="form-group">
                <label for="image">Replace Image</label>

                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
            </div>


            <div class="mt-4">

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i>
                    Update Doctor
                </button>

                <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </div>


        </form>


    </div>


</div>


@endsection