<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <header class="topbar">
        <div class="container nav-row">
            <a class="brand" href="{{ route('dashboard') }}">Course Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-light" type="submit">Logout</button>
            </form>
        </div>
    </header>

    <main class="container page">
        <h1>Welcome, {{ auth()->user()->name }}!</h1>
        <p class="muted">Register and manage your own courses.</p>

        @if (session('success'))
            <div class="notice success" role="status">
                {{ session('success') }}
            </div>
        @endif

        <div class="dashboard-grid">
            <section class="card">
                @include('courses.form')
            </section>
            <section class="card">
                @include('courses.table')
            </section>
        </div>

        @if ($viewing)
            @include('courses.details')
        @endif
    </main>
</body>
</html>
