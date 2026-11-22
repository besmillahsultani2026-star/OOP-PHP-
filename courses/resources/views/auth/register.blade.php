@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
    <h1>Sign Up</h1>
    <p>Create your student account.</p>

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <label for="name">Name</label>
        <input
            id="name"
            type="text"
            name="name"
            value="{{ old('name') }}"
            maxlength="255"
            autocomplete="name"
            required
        >

        <label for="email">Email</label>
        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            maxlength="255"
            autocomplete="email"
            required
        >

        <label for="password">Password</label>
        <input
            id="password"
            type="password"
            name="password"
            minlength="8"
            autocomplete="new-password"
            required
        >

        <label for="password_confirmation">Confirm Password</label>
        <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            minlength="8"
            autocomplete="new-password"
            required
        >

        <button type="submit">Create Account</button>
    </form>

    <p>
        Already have an account?
        <a href="{{ route('login') }}">Sign in</a>
    </p>
@endsection