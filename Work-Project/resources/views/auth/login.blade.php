@extends('layouts.app')
@include('layouts.nbcustomer')
@section('content')

<style>
    .login-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        z-index: -1;
        transition: background-image 1s ease-in-out;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Ensure the container takes the full height */
        padding: 10px;
    }

    .login-card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff; /* Ensure the card background is set */
        justify-content: center;
        position: relative; /* Make sure it stacks correctly */
        z-index: 1; /* Ensure it appears above the background */
        max-width: 600px;
        width: 100%;
    }

    .login-card-header {
        background-color: #411acc;
        color: #fafcff;
        font-weight: bold;
        text-align: center;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 10px;
    }

    .login-form-control {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .login-btn-primary, .login-btn-success, .login-btn-secondary {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
    }

    .login-btn-primary {
        background-color: #411acc;
        border: none;
    }

    .login-btn-primary:hover {
        background-color: #320e99;
    }

    .login-btn-success {
        background-color: #28a745;
        border: none;
    }

    .login-btn-success:hover {
        background-color: #218838;
    }

    .login-btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .login-btn-secondary:hover {
        background-color: #5a6268;
    }

    .login-content-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center; /* Center the form elements horizontally */
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
    }

    .login-form-group {
        width: 100%; /* Ensure the form group takes full width */
        display: flex;
        justify-content: center; /* Center the form group elements horizontally */
    }
</style>

<div class="login-background" id="background"></div>

<div class="login-container">
    <div class="login-card">
        <div class="login-card-header">{{ __('Login') }}</div>

        <div class="login-content-wrapper">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="login-form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="login-form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="login-btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const backgroundUrls = [
            '/images/backgrounds/fondo1.jpg',
            '/images/backgrounds/fondo2.jpg',
            '/images/backgrounds/fondo3.png',
            '/images/backgrounds/fondo4.jpg',
            '/images/backgrounds/fondo5.jpg',
            '/images/backgrounds/fondo6.jpg',
            '/images/backgrounds/fondo7.jpg'
        ];

        let currentImageIndex = 0;
        const backgroundElement = document.getElementById('background');

        function changeBackground() {
            currentImageIndex = (currentImageIndex + 1) % backgroundUrls.length;
            backgroundElement.style.backgroundImage = `url(${backgroundUrls[currentImageIndex]})`;
        }

        setInterval(changeBackground, 4000); // Change the image every 4 seconds
        changeBackground(); // Initialize with the first background
    });
</script>
@endsection
