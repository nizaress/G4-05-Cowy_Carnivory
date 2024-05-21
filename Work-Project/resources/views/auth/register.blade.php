@extends('layouts.app')
@include('layouts.nbcustomer')
@section('content')
<style>
    .register-background {
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

    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Ensure the container takes the full height */
        padding: 10px;
    }

    .register-card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff; /* Ensure the card background is set */
        justify-content: center;
        position: relative; /* Make sure it stacks correctly */
        z-index: 1; /* Ensure it appears above the background */
        max-width: 600px;
        width: 100%;
    }

    .register-card-header {
        background-color: #411acc;
        color: #fafcff;
        font-weight: bold;
        text-align: center;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 10px;
    }

    .register-form-control {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .register-btn-primary, .register-btn-success, .register-btn-secondary {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
    }

    .register-btn-primary {
        background-color: #411acc;
        border: none;
    }

    .register-btn-primary:hover {
        background-color: #320e99;
    }

    .register-btn-success {
        background-color: #28a745;
        border: none;
    }

    .register-btn-success:hover {
        background-color: #218838;
    }

    .register-btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .register-btn-secondary:hover {
        background-color: #5a6268;
    }

    .register-content-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center; /* Center the form elements horizontally */
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
    }

    .register-form-group {
        width: 100%; /* Ensure the form group takes full width */
        display: flex;
        justify-content: center; /* Center the form group elements horizontally */
    }
</style>

<div class="register-background" id="background"></div>

<div class="register-container">
    <div class="register-card">
        <div class="register-card-header">{{ __('Register') }}</div>

        <div class="register-content-wrapper">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="register-form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="register-form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Address -->
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="register-form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Phone Number -->
                <div class="form-group row">
                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input id="phone_number" type="text" class="register-form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required>

                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Card Number -->
                <div class="form-group row">
                    <label for="card_number" class="col-md-4 col-form-label text-md-right">{{ __('Card Number') }}</label>

                    <div class="col-md-6">
                        <input id="card_number" type="text" class="register-form-control @error('card_number') is-invalid @enderror" name="card_number" value="{{ old('card_number') }}" required>

                        @error('card_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="register-form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="register-form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="register-btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
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
