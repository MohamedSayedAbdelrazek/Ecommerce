@extends('admin.layouts.auth')

@section('title', 'Login')

@section('content')
<div class="auth-card" style="background: linear-gradient(to right, #0a1929, #1a2942, #2d3e5f);">
    <h3 class="text-center mb-4 text-white">Login</h3>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label text-white">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label text-white">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label text-white" for="remember">Remember me</label>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <div class="mt-3 text-center">
            <a href="{{ route('register') }}" class="text-decoration-none text-white">Don't have an account? Register</a>
        </div>
    </form>
</div>
@endsection
