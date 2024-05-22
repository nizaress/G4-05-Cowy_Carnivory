<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Cowy Carnivory</title>
    <style>
        
        .footer {
            background-color: #07080c;
            color: #fafcff;
            padding: 40px 20px;
        }
        .footer .ft-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #07080c;
        }
        .footer h3 {
            margin-bottom: 20px;
        }
        .footer ul {
            list-style: none;
            padding: 0;
        }
        .footer ul li {
            margin-bottom: 10px;
        }
        .footer ul li a {
            color: #fafcff;
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer ul li a:hover {
            color: #411acc;
        }
        .footer .social-icons a {
            color: #fafcff;
            margin-right: 10px;
            font-size: 1.5em;
            transition: color 0.3s;
        }
        .footer .social-icons a:hover {
            color: #411acc;
        }
        .footer .app-links img {
            width: 120px;
            margin-right: 10px;
            transition: opacity 0.3s;
        }
        .footer .app-links img:hover {
            opacity: 0.8;
        }
        @media (max-width: 768px) {
            .footer .ft-container {
                flex-direction: column;
                align-items: center;
            }
            .footer .col {
                margin-bottom: 20px;
                text-align: center;
            }
            .footer .col:last-child {
                margin-bottom: 0;
            }
        }
    </style>
</head>
<body>

    <br>
    <br>

    <footer class="footer">
        <br>
        <div class="ft-container">
            <div class="col">
                <h3>About Cowy Carnivory</h3>
                <p>Cowy Carnivory is a project that aims</p>
                <p>to provide a platform for vendors to</p>
                <p>sell their products online.</p>
            </div>
            <div class="col">
                <h3>Important links</h3>
                <ul>
                    <li><a href="{{ route('info') }}">Project Information</a></li>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="col">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <br>
        <div class="ft-container">
            <div class="col" style="flex: 1; text-align: center; margin-top: 20px;">
                <p>&copy; 2024 Cowy Carnivory. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
