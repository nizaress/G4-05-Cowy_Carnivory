@extends('layouts.app')

@section('content')<style>
    body, html {
        height: 100%;
        font-family: 'Verdana', sans-serif;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        background-color: #f2f2f2;
    }

    .container {
        margin-top: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        max-width: 600px;
    }

    .card {
        width: 100%;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .card-header {
        background-color: #411acc;
        color: #fafcff;
        font-weight: bold;
        text-align: center;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 10px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        box-sizing: border-box;
    }

    .btn-primary, .btn-success, .btn-secondary {
        width: 30%;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
        margin: 5px;
    }

    .btn-primary {
        background-color: #411acc;
        border: none;
    }

    .btn-primary:hover {
        background-color: #320e99;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>

@include('layouts.nbcustomer')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Profile</h2>
        </div>
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
            <div class="form-group">
                <button type="button" id="edit-button" class="btn btn-primary">Edit</button>
                <button type="submit" id="save-button" class="btn btn-success" style="display: none;">Save Changes</button>
                <button type="button" id="cancel-button" class="btn btn-secondary" style="display: none;">Cancel</button>
            </div>
        </form>
    </div>
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
