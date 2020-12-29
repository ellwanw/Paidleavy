@extends('layouts.app')

@section('content')

<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                @csrf
                <h2 class="title">Sign in</h2>
                @error('username')
                <span class="invalid-feedback" role="alert" style="color:red;">
                    <strong>{{ 'Something Wrong, Please Check Sign up!' }}</strong>
                </span>
                @enderror
                @error('name')
                <span class="invalid-feedback" role="alert" style="color:red;">
                    <strong>{{ 'Something Wrong, Please Check Sign up' }}</strong>
                </span>
                @enderror
                @error('password')
                <span class="invalid-feedback" role="alert" style="color:red;">
                    <strong>{{ 'Something Wrong, Please Check Sign up' }}</strong>
                </span>
                @enderror
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input id="username" type="text" placeholder="Username"
                        class="input @error('username') is-invalid @enderror" name="username" required
                        autocomplete="username" autofocus>
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" placeholder="Password"
                        class="input @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                </div>
                <div class="rememberMe">
                    <input class="form-check-input " type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <input type="submit" value="Login" class="btn solid" />

            </form>

            {{-- Register --}}
            <form method="POST" action="{{ route('register') }}" class="sign-up-form">
                @csrf
                <h2 class="title">Sign up</h2>

                @error('username')
                <span class="invalid-feedback" role="alert" style="color:red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @error('name')
                <span class="invalid-feedback" role="alert" style="color:red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @error('password')
                <span class="invalid-feedback" role="alert" style="color:red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="input-field">
                    <i class="fas fa-pen"></i>
                    <input id="name" type="text" placeholder="Full Name"
                        class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                        required autocomplete="name" autofocus>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input id="username" type="username" placeholder="Username"
                        class="form-control @error('username') is-invalid @enderror" name="username"
                        value="{{ old('username') }}" required autocomplete="username">
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">

                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password-confirm" type="password" placeholder="Password Confirm" class="form-control"
                        name="password_confirmation" required autocomplete="new-password"> </div>
                <input type="submit" class="btn" value="Sign up" />
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Don't have an account yet?</h3>
                <p>
                    Be our next user!
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    Sign up
                </button>
            </div>
            <img src="assets/img/bg.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Already have an account?</h3>
                <p>
                    sign in and get your leave now!
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Sign in
                </button>
            </div>
            <img src="assets/img/register.svg" class="image" alt="" />
        </div>
    </div>
</div>
@endsection