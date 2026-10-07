@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h2>Sign In to Your Account</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group checkbox">
            <label>
                <input type="checkbox" name="remember"> Remember me
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Log In</button>
    </form>
</div>
@endsection