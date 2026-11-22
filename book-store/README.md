| Part | File | Topic |
| ---- | ---- | ----- |
| A | `database/migrations/` | Create the `books` table with `user_id`, `title`, `author`, `pages`, and timestamps |
| B | `app/Models/Book.php` | Define the Book model and its fillable fields |
| C | `app/Http/Controllers/BookController.php` | Implement book registration, input validation, and retrieval of the authenticated user's books |
| D | `routes/web.php` | Define the authenticated dashboard and book registration routes |
| E | `resources/views/books/create.blade.php` | Build the book registration form with Title, Author, and Pages inputs, validation messages, and CSRF protection |
| F | `resources/views/dashboard.blade.php` | Display the authenticated user's registered books in a My Books table and provide a link to the book registration page |
| G | Testing checklist | Test book registration, validation, database persistence, user-specific book lists, and dashboard protection after logout |
