# Laravel 12 -- Course Dashboard

This project implements a course management dashboard in Laravel 12.
Authenticated users can register, view, edit, and delete their own
courses. Each user's course list is kept separate, and course records
are protected by authentication and ownership checks.

## Implementation Parts

  -----------------------------------------------------------------------------------------------
  Part                  File                                          Topic
  --------------------- --------------------------------------------- ---------------------------
  A                     `database/migrations/`                        Create the `courses` table
                                                                      with `user_id`,
                                                                      `course_code`,
                                                                      `course_name`,
                                                                      `credit_hours`, `semester`,
                                                                      and timestamps. Add a
                                                                      unique index for `user_id`
                                                                      and `course_code`.

  B                     `app/Models/Course.php`                       Define the Course model,
                                                                      its fillable fields, and
                                                                      its relationship to the
                                                                      user.

  C                     `app/Http/Controllers/CourseController.php`   Implement course listing,
                                                                      registration, details,
                                                                      editing, updating,
                                                                      deletion, input validation,
                                                                      course-code normalization,
                                                                      and authenticated-user
                                                                      ownership checks.

  D                     `routes/web.php`                              Define the authenticated
                                                                      dashboard and course routes
                                                                      for listing, registration,
                                                                      viewing, editing, updating,
                                                                      and deleting courses.
                                                                      Preserve the existing
                                                                      authentication routes.

  E                     `resources/views/courses/form.blade.php`      Build the course
                                                                      registration and editing
                                                                      form with Course Code,
                                                                      Course Name, Credit Hours,
                                                                      and Semester inputs,
                                                                      validation messages, and
                                                                      CSRF protection.

  F                     `resources/views/dashboard.blade.php`         Display the authenticated
                                                                      user's courses in a
                                                                      dashboard table and provide
                                                                      controls to view, edit, and
                                                                      delete their own courses.

  G                     `resources/views/courses/table.blade.php`,    Provide reusable
                        `resources/views/courses/details.blade.php`   course-table and
                                                                      course-details views.

  H                     `public/css/dashboard.css`                    Style the dashboard and
                                                                      course-management
                                                                      interface, including
                                                                      responsive layout.

  I                     Testing checklist                             Test course registration,
                                                                      validation, database
                                                                      persistence, duplicate
                                                                      course-code prevention per
                                                                      user, user-specific course
                                                                      lists, view/edit/delete
                                                                      operations, and dashboard
                                                                      protection after logout.
  -----------------------------------------------------------------------------------------------

## Course Fields

  -----------------------------------------------------------------------
  Field                  Description
  ---------------------- ------------------------------------------------
  `user_id`              ID of the authenticated user who owns the course

  `course_code`          Course identifier; stored in uppercase and
                         unique per user

  `course_name`          Name of the course

  `credit_hours`         Integer from 1 to 6

  `semester`             `Spring 2026` or `Fall 2026`
  -----------------------------------------------------------------------

## Installation and Integration

1.  Make sure the existing Laravel 12 project and authentication system
    are working.

2.  Copy the provided files into the matching directories in your
    existing project.

3.  Add the course routes from `routes/course-routes-snippet.php.txt` to
    the existing `routes/web.php` file. Do not replace your existing
    login, registration, or logout routes.

4.  Check that the `courses` migration includes all fields listed above
    and the composite unique index on `user_id` and `course_code`.

5.  Run the migration:

    ``` bash
    php artisan migrate
    ```

6.  Make sure the dashboard route is protected by the `auth` middleware
    and that the logout route remains available.

7.  Start the Laravel development server if needed:

    ``` bash
    php artisan serve
    ```

**Important:** Do not run `php artisan migrate:fresh` on a project that
contains data you need to keep. It drops existing tables and their data.

## Validation Rules

-   `course_code`: required, string, maximum 20 characters; trimmed and
    converted to uppercase.
-   `course_name`: required, string, maximum 150 characters.
-   `credit_hours`: required integer between 1 and 6.
-   `semester`: required; must be either `Spring 2026` or `Fall 2026`.
-   `course_code` must be unique for the authenticated user. Different
    users may use the same course code.

## Testing Checklist

-   [ ] Open the dashboard while logged in.
-   [ ] Register a course using valid information.
-   [ ] Confirm the course is saved in the `courses` database table.
-   [ ] Try submitting the form with missing or invalid values and
    confirm validation messages appear.
-   [ ] Register two courses with the same course code for the same user
    and confirm the duplicate is rejected.
-   [ ] Register the same course code under a different user and confirm
    it is allowed.
-   [ ] Confirm each user sees only their own courses.
-   [ ] Open a course's details page.
-   [ ] Edit a course and confirm the changes are saved.
-   [ ] Delete a course and confirm it is removed.
-   [ ] Log out and try to open `/dashboard`; confirm access is denied
    or redirected to login.

## Notes

-   The implementation is intended to be integrated into the existing
    Laravel project.
-   Keep the existing authentication flow and route names, especially
    the `logout` route used by the dashboard.
-   If your existing dashboard contains other content, merge the
    course-table section into it rather than overwriting content you
    want to keep.
