@extends('layouts.app')

@section('content')
<div class="v85_3">
    <div class="v85_4"></div>
    <div class="container">
        <div class="card mx-auto p-5" style="max-width: 800px; background: #01403A; border-radius: 20px;">
            <!-- Header Section -->
            <div class="text-left mb-4">
                <h2 class="font-weight-bold" style="color: #ffffff;">Welcome to JustDrink!</h2>
                <p style="color: #ffffff;">Sign up for an account</p>
            </div>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required placeholder="First Name" style="border-radius: 10px;">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required placeholder="Last Name" style="border-radius: 10px;">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email Address" style="border-radius: 10px;">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" style="border-radius: 10px;">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" style="border-radius: 10px;">
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" style="background-color: #FFA726; color: #ffffff; border: none; padding: 10px 20px; border-radius: 20px; font-weight: bold;">Sign Up</button>
                </div>
            </form>
        </div>
    </div>

</div>
{{--
    <div class="container">
        <div class="card mx-auto p-5" style="max-width: 800px; background: #01403A; border-radius: 20px;">
            <!-- Header Section -->
            <div class="text-left mb-4">
                <h2 class="font-weight-bold" style="color: #ffffff;">Welcome to JustDrink!</h2>
                <p style="color: #ffffff;">Sign up for an account</p>
            </div>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required placeholder="First Name" style="border-radius: 10px;">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required placeholder="Last Name" style="border-radius: 10px;">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email Address" style="border-radius: 10px;">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" style="border-radius: 10px;">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" style="border-radius: 10px;">
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" style="background-color: #FFA726; color: #ffffff; border: none; padding: 10px 20px; border-radius: 20px; font-weight: bold;">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</section>--}}
@endsection
