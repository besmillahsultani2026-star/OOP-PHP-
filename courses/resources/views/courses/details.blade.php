<section class="card details">
    <h2>Course Details</h2>
    <dl class="detail-grid">
        <dt>Course Code</dt>
        <dd>{{ $viewing->course_code }}</dd>
        <dt>Course Name</dt>
        <dd>{{ $viewing->course_name }}</dd>
        <dt>Credit Hours</dt>
        <dd>{{ $viewing->credit_hours }}</dd>
        <dt>Semester</dt>
        <dd>{{ $viewing->semester }}</dd>
        <dt>Registered On</dt>
        <dd>{{ $viewing->created_at->format('d M Y, H:i') }}</dd>
    </dl>

    <div class="actions">
        <a class="btn btn-primary" href="{{ route('courses.edit', $viewing->id) }}">
            Edit This Course
        </a>
        <a class="btn btn-neutral" href="{{ route('dashboard') }}">Close Details</a>
    </div>
</section>
