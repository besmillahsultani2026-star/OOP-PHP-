# Laravel 12 – Course Dashboard

| Part | File | Topic |
| ---- | ---- | ----- |
| A | `database/migrations/` | Create the `courses` table with `user_id`, `course_code`, `course_name`, `credit_hours`, `semester`, and timestamps |
| B | `app/Models/Course.php` | Define the Course model and its fillable fields |
| C | `app/Http/Controllers/CourseController.php` | Implement course registration, validation, retrieval, viewing, editing, updating, and deletion for the authenticated user's courses |
| D | `routes/web.php` | Define the authenticated dashboard and course management routes |
| E | `resources/views/courses/form.blade.php` | Build the course registration and editing form with validation messages and CSRF protection |
| F | `resources/views/dashboard.blade.php` | Display the authenticated user's courses in a dashboard table and provide course management links/actions |
| G | `resources/views/courses/table.blade.php` and `resources/views/courses/details.blade.php` | Display the course list and individual course details |
| H | `public/css/dashboard.css` | Style the course dashboard and its components |
| I | Testing checklist | Test course registration, validation, database persistence, user-specific course lists, and course viewing, editing, and deletion |
