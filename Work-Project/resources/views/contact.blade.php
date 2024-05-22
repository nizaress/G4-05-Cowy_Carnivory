<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Contact Us - Cowy Carnivory</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
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
            font-weight: bold;
            margin-top: 20px;
            color: #411acc;
            text-align: center;
        }

        .team-member {
            background-color: #fafcff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .team-member h3 {
            font-size: 2em;
            color: #07080c;
        }

        .team-member p {
            font-size: 1.2em;
            color: #444956;
        }

        .team-member img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 50%;
        }

        .team-member .content {
            max-width: 70%;
            text-align: left;
        }

        .contact-info {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .contact-info .info-box {
            background-color: #07080c;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 30%;
            text-align: center;
        }

        .info-box {
            margin-left: 10px;
            margin-right: 10px;
        }

        .contact-info .info-box h3 {
            margin-top: 0;
            color: #fafcff;
        }

        .contact-info .info-box p {
            color: #fafcff;
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
        <div class="section-title">Contact Us</div>

        <div class="team-member">
            <img src="/images/team/cristian.jpg" alt="Cristian Andrés Córdoba Silvestre">
            <div class="content">
                <h3>Cristian Andrés Córdoba Silvestre</h3>
                <p>Project Manager and Lead Programmer</p>
                <p>Cristian leads the project with a strong focus on delivering high-quality results. He oversees all aspects of the project, ensuring everything runs smoothly and efficiently.</p>
                <p>cacs2@alu.ua.es</p>
                <p>+34 695567137</p>
            </div>
        </div>

        <div class="team-member">
            <div class="content">
                <h3>Nur del Amo García</h3>
                <p>Frontend Developer</p>
                <p>Nur specializes in front-end development, crafting user-friendly and visually appealing interfaces. Her expertise ensures a seamless and engaging user experience.</p>
                <p>ndag1@alu.ua.es</p>
                <p>+34 689236462</p>
            </div>
            <img src="/images/team/nur.jpg" alt="Nur del Amo García">
        </div>

        <div class="team-member">
            <img src="/images/team/nizar.jpg" alt="Nízar Nortes Pastor">
            <div class="content">
                <h3>Nízar Nortes Pastor</h3>
                <p>Backend Developer</p>
                <p>Nízar focuses on back-end development, managing the server, database, and application logic. He ensures the system is robust, scalable, and performs optimally.</p>
                <p>nnpn1@alu.ua.es</p>
                <p>+34 644964126</p>
            </div>
        </div>

        <div class="contact-info">
            <div class="info-box">
                <h3>Address</h3>
                <p>123 Foodie Lane,<br>Gourmet City, FC 12345</p>
            </div>
            <div class="info-box">
                <h3>Email</h3>
                <p>support@cowycarnivory.com</p>
            </div>
            <div class="info-box">
                <h3>Phone</h3>
                <p>(123) 456-7890</p>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
