
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | IT Student Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('login') }}">
            IT Student Portal
        </a>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <h2 class="text-center mb-2">Create Account</h2>
                    <p class="text-center text-muted mb-4">
                        Register to access the student portal.
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('register.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Full Name
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="Enter your full name"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email Address
                            </label>
                            <input type="email"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="you@example.com"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password
                            </label>
                            <input type="password"
                                   class="form-control"
                                   id="password"
                                   name="password"
                                   minlength="8"
                                   placeholder="At least 8 characters"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation"
                                   class="form-label">
                                Confirm Password
                            </label>
                            <input type="password"
                                   class="form-control"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   minlength="8"
                                   placeholder="Repeat your password"
                                   required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100">
                            Create Account
                        </button>
                    </form>

                    <p class="text-center mt-4 mb-0">
                        Already registered?
                        <a href="{{ route('login') }}"
                           class="text-decoration-none">
                            Sign in
                        </a>
                    </p>

                </div>
            </div>



        </div>
    </div>
</div>

</body>
</html>
