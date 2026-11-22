<h2>{{ $editing ? 'Edit Course' : 'Register a Course' }}</h2>
<p class="muted">Fields marked * are required.</p>

@if ($errors->any())
    <div class="notice error" role="alert">
        <strong>Please correct the following:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST"
      action="{{ $editing ? route('courses.update', $editing->id) : route('courses.store') }}">
    @csrf
    @if ($editing)
        @method('PUT')
    @endif

    <div class="field">
        <label for="course_code">Course Code *</label>
        <input id="course_code" name="course_code" type="text"
               value="{{ old('course_code', $editing?->course_code) }}"
               maxlength="20" required>
    </div>

    <div class="field">
        <label for="course_name">Course Name *</label>
        <input id="course_name" name="course_name" type="text"
               value="{{ old('course_name', $editing?->course_name) }}"
               maxlength="150" required>
    </div>

    <div class="field">
        <label for="credit_hours">Credit Hours *</label>
        <input id="credit_hours" name="credit_hours" type="number"
               value="{{ old('credit_hours', $editing?->credit_hours) }}"
               min="1" max="6" step="1" required>
    </div>

    <div class="field">
        <label for="semester">Semester *</label>
        <select id="semester" name="semester" required>
            <option value="">Select semester</option>
            @foreach (['Spring 2026', 'Fall 2026'] as $term)
                <option value="{{ $term }}"
                    @selected(old('semester', $editing?->semester) === $term)>
                    {{ $term }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="actions">
        <button class="btn btn-primary" type="submit">
            {{ $editing ? 'Save Changes' : 'Register Course' }}
        </button>
        @if ($editing)
            <a class="btn btn-neutral" href="{{ route('dashboard') }}">Cancel</a>
        @endif
    </div>
</form>
