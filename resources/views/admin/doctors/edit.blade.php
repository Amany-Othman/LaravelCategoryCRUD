@extends('admin.layouts.app')

@section('title', 'Edit Doctor')

@section('page-heading', 'Edit Doctor')

@section('content')

<div class="card shadow mb-4 product-form-card">

    {{-- Card Header --}}
    <div class="card-header py-3 product-card-header">

        <h6 class="m-0">
            <i class="fas fa-edit mr-2"></i>
            Edit Doctor
        </h6>

        <p class="header-subtitle">
            Update the details below and save your changes.
        </p>

    </div>


    <div class="card-body">

        <form action="{{ route('admin.doctors.update', $doctor) }}" method="POST" enctype="multipart/form-data"
            class="product-form">

            @csrf
            @method('PUT')


            {{-- Row 1: Name (EN) + Name (AR) --}}
            <div class="form-row">

                <div class="form-group col-md-6">

                    <label>Name (English)</label>

                    <input type="text" name="name_en" class="form-control"
                        value="{{ old('name_en', $doctor->name_en) }}" placeholder="Enter doctor's name in English"
                        required>

                    @error('name_en')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>

                <div class="form-group col-md-6">

                    <label>Name (Arabic)</label>

                    <input type="text" name="name_ar" class="form-control"
                        value="{{ old('name_ar', $doctor->name_ar) }}" placeholder="أدخل اسم الطبيب بالعربية" dir="rtl"
                        required>

                    @error('name_ar')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>

            </div>


            {{-- Row 2: Specialty (EN) + Specialty (AR) --}}
            <div class="form-row">

                <div class="form-group col-md-6">

                    <label>Specialty (English)</label>

                    <input type="text" name="specialty_en" class="form-control"
                        value="{{ old('specialty_en', $doctor->specialty_en) }}"
                        placeholder="Enter specialty in English" required>

                    @error('specialty_en')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>

                <div class="form-group col-md-6">

                    <label>Specialty (Arabic)</label>

                    <input type="text" name="specialty_ar" class="form-control"
                        value="{{ old('specialty_ar', $doctor->specialty_ar) }}" placeholder="أدخل التخصص بالعربية"
                        dir="rtl" required>

                    @error('specialty_ar')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>

            </div>


            {{-- Doctor Image --}}
            <div class="form-group">

                <label>Doctor Image</label>

                @php
                $currentImageUrl = $doctor->image ? asset($doctor->image) : null;
                @endphp

                <div id="image-drop-zone" class="{{ $currentImageUrl ? 'has-image' : '' }}">

                    <div id="upload-placeholder" class="{{ $currentImageUrl ? 'd-none' : '' }}">

                        <div class="upload-icon-circle">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>

                        <div class="upload-title">
                            Drag & Drop your new image here
                        </div>

                        <div class="upload-text">
                            or click to choose a new image
                        </div>

                        <div class="upload-info">
                            PNG, JPG or JPEG
                        </div>

                    </div>

                    <input type="file" name="image" id="image-input" accept="image/*" hidden>

                    <div id="image-preview">

                        @if ($currentImageUrl)

                        <img src="{{ $currentImageUrl }}" alt="{{ $doctor->name_en }}" class="img-thumbnail">

                        <div class="image-preview-overlay">
                            <i class="fas fa-camera"></i>
                            <span>Change Image</span>
                        </div>

                        @endif

                    </div>

                </div>

                @error('image')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror

            </div>


            {{-- Buttons --}}
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-check mr-1"></i>
                Update Doctor
            </button>



        </form>

    </div>

</div>

@endsection