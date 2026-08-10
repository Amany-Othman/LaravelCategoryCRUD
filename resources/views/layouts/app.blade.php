<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Category Management')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <nav class="navbar">
        <div class="container navbar-content">
            <a href="{{ route('category.index') }}" class="brand">
                Category Manager
            </a>

            <span class="navbar-label">
                Admin Panel
            </span>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

</body>

</html>