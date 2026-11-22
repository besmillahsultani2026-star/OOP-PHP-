@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
    <h1>Sign In</h1>
    <p>Enter your email and password.</p>

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <label for="email">Email</label>
        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            autocomplete="username"
            required
        >

        <label for="password">Password</label>
        <input
            id="password"
            type="password"
            name="password"
            autocomplete="current-password"
            required
        >

        <button type="submit">Sign In</button>
    </form>

    <p>
        Need an account?
        <a href="{{ route('register') }}">Sign up</a>
    </p>
@endsection