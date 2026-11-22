
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | IT Student Portal</title>

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
        <h2>Student Dashboard</h2>
        <p class="text-muted">
            Welcome to your personal student portal.
        </p>
    </div>

    <!-- Student Information -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">

            <h5 class="mb-4">Student Information</h5>

            <div class="mb-3">
                <label class="form-label text-muted">Full Name</label>
                <p class="fs-5 fw-semibold mb-0">
                    {{ auth()->user()->name }}
                </p>
            </div>

            <hr>

            <div class="mb-3">
                <label class="form-label text-muted">Email Address</label>
                <p class="fs-5 mb-0">
                    {{ auth()->user()->email }}
                </p>
            </div>

            <div class="alert alert-success mb-0 mt-4">
                You are successfully logged in.
            </div>

        </div>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Book Registration Link -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4 d-flex flex-column flex-md-row
                    justify-content-between align-items-md-center gap-3">

            <div>
                <h5 class="mb-2">Book Registration</h5>
                <p class="text-muted mb-0">
                    Add a new book to your personal reading list.
                </p>
            </div>

            <a href="{{ route('books.create') }}" class="btn btn-primary">
                Register a Book
            </a>

        </div>
    </div>

    <!-- My Books Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <h5 class="mb-4">My Books</h5>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Pages</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->pages }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"
                                    class="text-center text-muted py-4">
                                    No books registered yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
