@extends('admin.layouts.app')

@section('title', 'Edit Appointment')

@section('page-heading', 'Edit Appointment')

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-calendar-check mr-2"></i>
            Edit Appointment
        </h6>

        <span class="badge badge-pill
            @class([
                'badge-warning' => $appointment->status === 'pending',
                'badge-success' => $appointment->status === 'confirmed',
                'badge-danger'  => $appointment->status === 'cancelled',
            ])">
            {{ ucfirst($appointment->status) }}
        </span>
    </div>

    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 pl-3">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.appointments.update', $appointment) }}" method="POST">

            @csrf
            @method('PUT')

            <h6 class="text-uppercase text-muted small font-weight-bold mb-3">
                <i class="fas fa-user-md mr-1"></i> Doctor & Schedule
            </h6>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="doctor_name">
                        <i class="fas fa-stethoscope mr-1 text-primary"></i> Doctor
                    </label>
                    <input type="text" name="doctor_name" id="doctor_name"
                        class="form-control @error('doctor_name') is-invalid @enderror"
                        value="{{ old('doctor_name', $appointment->doctor_name) }}" required>
                    @error('doctor_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="appointment_date">
                        <i class="fas fa-calendar-day mr-1 text-primary"></i> Date
                    </label>
                    <input type="date" name="appointment_date" id="appointment_date"
                        class="form-control @error('appointment_date') is-invalid @enderror"
                        value="{{ old('appointment_date', \Illuminate\Support\Carbon::parse($appointment->appointment_date)->format('Y-m-d')) }}"
                        required>
                    @error('appointment_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="appointment_time">
                        <i class="fas fa-clock mr-1 text-primary"></i> Time
                    </label>
                    <input type="time" name="appointment_time" id="appointment_time"
                        class="form-control @error('appointment_time') is-invalid @enderror"
                        value="{{ old('appointment_time', \Illuminate\Support\Carbon::parse($appointment->appointment_time)->format('H:i')) }}"
                        required>
                    @error('appointment_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <hr class="my-4">

            <h6 class="text-uppercase text-muted small font-weight-bold mb-3">
                <i class="fas fa-id-card mr-1"></i> Patient Details
            </h6>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="name">
                        <i class="fas fa-user mr-1 text-primary"></i> Patient Name
                    </label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $appointment->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label for="age">
                        <i class="fas fa-birthday-cake mr-1 text-primary"></i> Age
                    </label>
                    <input type="number" name="age" id="age" class="form-control @error('age') is-invalid @enderror"
                        value="{{ old('age', $appointment->age) }}" min="1" max="120" required>
                    @error('age')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="phone">
                        <i class="fas fa-phone mr-1 text-primary"></i> Phone
                    </label>
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone', $appointment->phone) }}" required>
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="email">
                        <i class="fas fa-envelope mr-1 text-primary"></i> Email
                    </label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $appointment->email) }}" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="status">
                        <i class="fas fa-flag mr-1 text-primary"></i> Status
                    </label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                        required>

                        <option value="pending"
                            {{ old('status', $appointment->status) === 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="confirmed"
                            {{ old('status', $appointment->status) === 'confirmed' ? 'selected' : '' }}>
                            Confirmed
                        </option>

                        <option value="cancelled"
                            {{ old('status', $appointment->status) === 'cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>

                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <hr class="my-4">

            <div class="d-flex align-items-center justify-content-between">



                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i>
                    Update Appointment
                </button>

            </div>

        </form>

    </div>

</div>

@endsection