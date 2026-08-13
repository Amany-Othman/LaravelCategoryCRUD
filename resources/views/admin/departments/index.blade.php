@extends('admin.layouts.app')
@section('title', 'Departments')

@section('page-heading', 'Departments')

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            Departments
        </h6>

        <a href="{{ route('admin.departments.create') }}" class="btn btn-primary btn-sm">
            Add Department
        </a>
    </div>

    <div class="card-body">

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="table-responsive">

            <table class="table table-bordered" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>English Name</th>
                        <th>Arabic Name</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($departments as $department)

                    <tr>
                        <td>{{ $department->id }}</td>

                        <td>{{ $department->name_en }}</td>

                        <td>{{ $department->name_ar }}</td>

                        <td>
                            {{ $department->icon ?? '-' }}
                        </td>

                        <td>
                            @if ($department->status)
                            <span class="badge badge-success">
                                Active
                            </span>
                            @else
                            <span class="badge badge-secondary">
                                Inactive
                            </span>
                            @endif
                        </td>

                        <td>

                            <a href="{{ route('admin.departments.edit', $department->id) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST"
                                style="display:inline-block;">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this department?')">
                                    Delete
                                </button>

                            </form>

                        </td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No departments found.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection