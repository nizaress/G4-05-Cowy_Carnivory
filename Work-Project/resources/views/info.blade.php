<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Project Information - Cowy Carnivory</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            color: #07080c;
            font-family: 'Verdana', sans-serif;
            background-color: #FAFCFF;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .section-title {
            font-size: 2.5em;
            margin-bottom: 20px;
            margin-top: 20px;
            color: #411acc;
            text-align: center;
            font-weight: bold;
        }

        .section {
            background-color: #fafcff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .section h3 {
            font-size: 2em;
            color: #07080c;
        }

        .section p {
            font-size: 1.2em;
            color: #444956;
        }

        .section ul {
            color: #444956;
        }

        .section img {
            max-width: 40%;
            height: auto;
            border-radius: 8px;
        }

        .section .content {
            max-width: 50%;
        }

        .info-box {
            background-color: #07080c;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            text-align: center;
        }

        .info-box h3 {
            color: #fafcff;
            font-size: 1.5em;
        }

        .team-member {
            background-color: #F3F6FF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            text-align: center;
            display: inline-block;
            width: 20%; /* Adjust to ensure three items per row */
            height: 325px;
            box-sizing: border-box;
            vertical-align: top; /* Aligns the boxes to the top */
        }

        .team-member h4 {
            color: #07080c;
        }

        .team-member p {
            color: #444956;
        }

        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .btn-contact {
            font-family: 'Verdana', sans-serif;
            font-size: 16px;
            font-weight: bold;
            background-color: #411acc;
            color: #fafcff;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 5px;
        }

        .btn-contact:hover {
            background-color: #fafcff;
            color: #07080c;
        }

        .btn-contact:active {
            transform: translateY(2px);
        }
    </style>
</head>
<body>
    @auth
        @if (Auth::user()->role == 'customer')
            @include('layouts.nbcustomer')
        @endif
    @endauth

    @guest
        @include('layouts.nbguest')
    @endguest

    <div class="container">
        <div class="section-title">Project Information</div>

        <div class="section">
            <img src="/images/home/food_delivery.jpg" alt="Food Delivery">
            <div class="content">
                <h3>What is Cowy Carnivory?</h3>
                <p>Cowy Carnivory is your ultimate food delivery platform, designed to bring the most delicious meals from a variety of local restaurants straight to your doorstep. Our mission is to provide a seamless, fast, and reliable food delivery experience for all our users.</p>
            </div>
        </div>

        <div class="section">
            <div class="content">
                <h3>What You Can Do on Cowy Carnivory</h3>
                <p>Explore the diverse range of features we offer:</p>
                <ul>
                    <li><strong>Browse Restaurants:</strong> Discover a variety of restaurants and cuisines to satisfy any craving.</li>
                    <li><strong>Place Orders:</strong> Easily place orders and enjoy quick delivery to your location.</li>
                    <li><strong>Manage Account:</strong> Update your profile and manage your orders with ease.</li>
                </ul>
            </div>
            <img src="/images/home/browse_restaurants.jpg" alt="Browse Restaurants">
        </div>

        <div class="section">
            <img src="/images/home/user_roles.jpg" alt="User Roles">
            <div class="content">
                <h3>User Roles</h3>
                <p>We have designed our platform to cater to different types of users:</p>
                <ul>
                    <li><strong>Guests:</strong> Browse the available restaurants and menus without needing an account.</li>
                    <li><strong>Customers:</strong> Register and log in to place orders, track deliveries, and manage your account.</li>
                    <li><strong>Vendors:</strong> Restaurant owners can manage their menu, view orders, and update restaurant information.</li>
                    <li><strong>Admins:</strong> Oversee the entire platform, manage users, and ensure smooth operations.</li>
                </ul>
            </div>
        </div>

        <div class="info-box">
            <h3>Our Team</h3>
            <div class="team-member">
                <img src="/images/team/cristian.jpg" alt="Cristian Andrés Córdoba Silvestre">
                <h4>Cristian Andrés Córdoba Silvestre</h4>
                <p>Project Manager and Lead Programmer</p>
            </div>
            <div class="team-member">
                <img src="/images/team/nur.jpg" alt="Nur del Amo García">
                <h4>Nur del Amo García</h4>
                <p>Frontend Developer</p>
            </div>
            <div class="team-member">
                <img src="/images/team/nizar.jpg" alt="Nízar Nortes Pastor">
                <h4>Nízar Nortes Pastor</h4>
                <p>Backend Developer</p>
            </div>
            <div style="text-align: center; width: 100%; margin-top: 20px;">
                <a href="{{ url('/contact') }}" class="btn-contact">Contact Us</a>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
