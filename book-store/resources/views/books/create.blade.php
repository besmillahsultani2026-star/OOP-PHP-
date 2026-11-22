
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Book | IT Student Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand fw-bold">
            IT Student Portal
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">
                Logout
            </button>
        </form>
    </div>
</nav>

<div class="container py-5">

    <div class="mb-4">
        <h2>Register a New Book</h2>
        <p class="text-muted">
            Enter the details of the book you want to add.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please correct the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        maxlength="150"
                        required
                    >

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input
                        type="text"
                        name="author"
                        id="author"
                        class="form-control @error('author') is-invalid @enderror"
                        value="{{ old('author') }}"
                        maxlength="100"
                        required
                    >

                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="pages" class="form-label">Pages</label>
                    <input
                        type="number"
                        name="pages"
                        id="pages"
                        class="form-control @error('pages') is-invalid @enderror"
                        value="{{ old('pages') }}"
                        min="1"
                        max="10000"
                        required
                    >

                    @error('pages')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Register Book
                </button>

                <a href="{{ route('dashboard') }}"
                   class="btn btn-outline-secondary ms-2">
                    Cancel
                </a>
            </form>

        </div>
    </div>

</div>

</body>
</html>
