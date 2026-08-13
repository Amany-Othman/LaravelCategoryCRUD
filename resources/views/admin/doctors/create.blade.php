@extends('admin.layouts.app')

@section('title', 'Add Doctor')

@section('page-heading', 'Add Doctor')

@section('content')

<div class="card shadow mb-4 product-form-card">

    {{-- Card Header --}}
    <div class="card-header py-3 product-card-header">

        <h6 class="m-0">
            <i class="fas fa-user-md mr-2"></i>
            Add New Doctor
        </h6>

        <p class="header-subtitle">
            Fill in the details below to add a new doctor to your team.
        </p>

    </div>


    <div class="card-body">

        <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data"
            class="product-form">

            @csrf


            {{-- Row 1: Name (EN) + Name (AR) --}}
            <div class="form-row">

                <div class="form-group col-md-6">

                    <label>Name (English)</label>

                    <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}"
                        placeholder="Enter doctor's name in English" required>

                    @error('name_en')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>

                <div class="form-group col-md-6">

                    <label>Name (Arabic)</label>

                    <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}"
                        placeholder="أدخل اسم الطبيب بالعربية" dir="rtl" required>

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

                    <input type="text" name="specialty_en" class="form-control" value="{{ old('specialty_en') }}"
                        placeholder="Enter specialty in English" required>

                    @error('specialty_en')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>

                <div class="form-group col-md-6">

                    <label>Specialty (Arabic)</label>

                    <input type="text" name="specialty_ar" class="form-control" value="{{ old('specialty_ar') }}"
                        placeholder="أدخل التخصص بالعربية" dir="rtl" required>

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

                <div id="image-drop-zone">

                    <div id="upload-placeholder">

                        <div class="upload-icon-circle">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>

                        <div class="upload-title">
                            Drag & Drop your image here
                        </div>

                        <div class="upload-text">
                            or click to choose an image
                        </div>

                        <div class="upload-info">
                            PNG, JPG or JPEG
                        </div>

                    </div>

                    <input type="file" name="image" id="image-input" accept="image/*" hidden>

                    <div id="image-preview"></div>

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
                Save Doctor
            </button>


        </form>

    </div>

</div>

@endsection