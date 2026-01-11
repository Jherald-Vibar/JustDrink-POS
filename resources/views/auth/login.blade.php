@extends('layouts.auth')


@section('css')

<style>
    .invalid-feedback {
        display: block;
    }


</style>
@endsection

@section(section: 'content')
<div class="v85_3">
    <div class="v85_4"></div>
    <div class="form-container">
        <div class="logo-container">
            <img src="/images/lugu.png" alt="Logo">
        </div>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="email" name="email" placeholder="Username or Email Address" required>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
                <a href="{{ route('password.request') }}" style="text-decoration:underline">Forgot Password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>

            <!-- Register Link -->
            <div class="text-center">
                <p>No Account? <a href="{{ route('register') }}" style="text-decoration:underline;">Register!</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
