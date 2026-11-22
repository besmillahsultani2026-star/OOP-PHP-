<h2>My Registered Courses ({{ $courses->count() }})</h2>
<p class="muted">Use View, Edit, or Delete beside a course.</p>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th scope="col">Code / Course</th>
                <th scope="col">Credits</th>
                <th scope="col">Semester</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr class="{{ $editing?->id === $course->id ? 'editing-row' : '' }}">
                    <td>
                        <strong>{{ $course->course_code }}</strong>
                        <span class="course-name">{{ $course->course_name }}</span>
                    </td>
                    <td>{{ $course->credit_hours }}</td>
                    <td>{{ $course->semester }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-neutral"
                               href="{{ route('courses.show', $course->id) }}">View</a>
                            <a class="btn btn-primary"
                               href="{{ route('courses.edit', $course->id) }}">Edit</a>
                            <form method="POST"
                                  action="{{ route('courses.destroy', $course->id) }}"
                                  onsubmit="return confirm('Delete this course?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No courses registered yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
