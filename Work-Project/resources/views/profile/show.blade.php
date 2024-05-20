<!-- resources/views/profile/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profile</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form id="profile-form" method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}" readonly>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ $user->phone_number }}" readonly>
        </div>
        <div class="form-group">
            <label for="card_number">Card Number</label>
            <input type="text" id="card_number" name="card_number" class="form-control" value="{{ $user->card_number }}" readonly>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password" readonly>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm new password" readonly>
        </div>
        <button type="button" id="edit-button" class="btn btn-primary">Edit</button>
        <button type="submit" id="save-button" class="btn btn-success" style="display: none;">Save Changes</button>
        <button type="button" id="cancel-button" class="btn btn-secondary" style="display: none;">Cancel</button>
    </form>
</div>

<script>
    document.getElementById('edit-button').addEventListener('click', function() {
        document.querySelectorAll('#profile-form input').forEach(input => input.readOnly = false);
        document.getElementById('edit-button').style.display = 'none';
        document.getElementById('save-button').style.display = 'inline-block';
        document.getElementById('cancel-button').style.display = 'inline-block';
    });

    document.getElementById('cancel-button').addEventListener('click', function() {
        document.querySelectorAll('#profile-form input').forEach(input => input.readOnly = true);
        document.getElementById('edit-button').style.display = 'inline-block';
        document.getElementById('save-button').style.display = 'none';
        document.getElementById('cancel-button').style.display = 'none';
    });
</script>
@endsection
