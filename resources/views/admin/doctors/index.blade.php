@extends('admin.layouts.app')


@section('title', 'Doctors')


@section('page-heading', 'Doctors')


@section('content')


<div class="card shadow mb-4">


    {{-- Card Header --}}
    <div class="card-header py-3 doctors-card-header">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h6 class="m-0">
                    <i class="fas fa-user-md mr-2"></i>
                    Doctors
                </h6>

                <p class="header-subtitle mb-0">
                    Manage your doctors
                </p>

            </div>

            <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Add Doctor
            </a>

        </div>

    </div>



    <div class="card-body">


        {{-- Doctors Count --}}
        <div class="products-count">
            <i class="fas fa-user-md"></i>
            Total Doctors:
            <strong>{{ $doctors->count() }}</strong>
        </div>



        {{-- Doctors Table --}}
        <div class="table-responsive">


            <table class="table table-bordered products-table">


                <thead>


                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name (English)</th>
                        <th>Name (Arabic)</th>
                        <th>Specialty (English)</th>
                        <th>Specialty (Arabic)</th>
                        <th>Action</th>
                    </tr>


                </thead>



                <tbody>


                    @forelse ($doctors as $doctor)


                    <tr>


                        {{-- ID --}}
                        <td>
                            {{ $doctor->id }}
                        </td>



                        {{-- Image --}}
                        <td>


                            @if ($doctor->image)

                            <img src="{{ asset($doctor->image) }}" alt="{{ $doctor->name_en }}"
                                class="product-table-image">

                            @else

                            <span class="no-image">
                                No Image
                            </span>

                            @endif


                        </td>



                        {{-- Name English --}}
                        <td>
                            {{ $doctor->name_en }}
                        </td>



                        {{-- Name Arabic --}}
                        <td dir="rtl">
                            {{ $doctor->name_ar }}
                        </td>



                        {{-- Specialty English --}}
                        <td>
                            {{ $doctor->specialty_en }}
                        </td>



                        {{-- Specialty Arabic --}}
                        <td dir="rtl">
                            {{ $doctor->specialty_ar }}
                        </td>



                        {{-- Action --}}
                        <td>


                            <div class="action-group">


                                {{-- Edit --}}
                                <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-warning btn-sm"
                                    title="Edit Doctor">
                                    <i class="fas fa-edit"></i>
                                </a>



                                {{-- Delete --}}
                                <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST"
                                    class="d-inline">


                                    @csrf
                                    @method('DELETE')


                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Doctor"
                                        onclick="return confirm('Are you sure you want to delete this doctor?')">
                                        <i class="fas fa-trash"></i>
                                    </button>


                                </form>


                            </div>


                        </td>


                    </tr>


                    @empty


                    <tr>


                        <td colspan="7" class="empty-state">


                            <i class="fas fa-user-md"></i>


                            <p>No doctors found.</p>


                        </td>


                    </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


    </div>


</div>


@endsection