<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Admin Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">


                <div class="card shadow">
                    <div class="card-body">

                        <h3 class="text-center mb-4">
                            Create Account
                        </h3>

                        <form action="{{ route('register') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    Name
                                </label>

                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                                    required>

                                @error('name')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email
                                </label>

                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" required>

                                @error('email')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Password
                                </label>

                                <input type="password" name="password" id="password" class="form-control" required>

                                @error('password')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">
                                    Confirm Password
                                </label>

                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Register
                            </button>

                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}">
                                Already have an account? Login
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>

</body>

</html>