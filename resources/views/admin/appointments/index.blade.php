@extends('admin.layouts.app')


@section('title', 'Appointments')


@section('page-heading', 'Appointments')


@section('content')


<div class="card shadow mb-4">


    {{-- Card Header --}}
    <div class="card-header py-3 appointments-card-header">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h6 class="m-0">
                    <i class="fas fa-calendar-check mr-2"></i>
                    Appointments
                </h6>

                <p class="header-subtitle mb-0">
                    Manage patient appointments
                </p>

            </div>

        </div>

    </div>


    <div class="card-body">


        {{-- Appointments Count --}}
        <div class="products-count">
            <i class="fas fa-calendar-alt"></i>
            Total Appointments:
            <strong>{{ $appointments->count() }}</strong>
        </div>


        {{-- Appointments Table --}}
        <div class="table-responsive">

            <table class="table table-bordered products-table">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Doctor</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse ($appointments as $appointment)

                    <tr>

                        <td>
                            {{ $appointment->id }}
                        </td>

                        <td>
                            {{ $appointment->doctor_name }}
                        </td>

                        <td>
                            {{ $appointment->name }}
                        </td>

                        <td>
                            {{ $appointment->age }}
                        </td>

                        <td>
                            {{ $appointment->phone }}
                        </td>

                        <td>
                            {{ $appointment->email }}
                        </td>

                        <td>
                            {{ $appointment->appointment_date }}
                        </td>

                        <td>
                            {{ $appointment->appointment_time }}
                        </td>

                        <td>

                            @if ($appointment->status === 'pending')

                            <span class="status-badge status-inactive">
                                Pending
                            </span>

                            @elseif ($appointment->status === 'confirmed')

                            <span class="status-badge status-active">
                                Confirmed
                            </span>

                            @else

                            <span class="status-badge status-inactive">
                                Cancelled
                            </span>

                            @endif

                        </td>

                        <td>

                            <div class="action-group">

                                {{-- Edit --}}
                                <a href="{{ route('admin.appointments.edit', $appointment) }}"
                                    class="btn btn-warning btn-sm" title="Edit Appointment">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Appointment"
                                        onclick="return confirm('Are you sure you want to delete this appointment?')">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="10" class="empty-state">

                            <i class="fas fa-calendar-times"></i>

                            <p>No appointments found.</p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


@endsection