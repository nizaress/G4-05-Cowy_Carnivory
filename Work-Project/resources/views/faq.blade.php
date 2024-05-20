<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>FAQ - Cowy Carnivory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #dbdfec;
        }
        .faq-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fafcff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 40px;
        }
        .faq-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #411acc;
        }
        .faq {
            margin-bottom: 20px;
        }
        .faq h3 {
            color: #07080c;
            margin-bottom: 10px;
        }
        .faq p {
            margin: 0;
            color: #444956;
        }
        .faq-toggle {
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .faq-toggle i {
            transition: transform 0.3s;
        }
        .faq-content {
            display: none;
            padding: 10px 0;
        }
        .faq-content.open {
            display: block;
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    @auth
        @if (Auth::user()->role == 'admin')
            @include('layouts.nbadmin')
        @elseif (Auth::user()->role == 'vendor')
            @include('layouts.nbvendor')
        @else
            @include('layouts.nbcustomer')
        @endif
    @endauth

    @guest
        @include('layouts.nbguest')

    @endguest

    <div class="faq-container">
        <h1>Frequently Asked Questions</h1>
        
        <div class="faq">
            <div class="faq-toggle">
                <h3>What is Cowy Carnivory?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-content">
                <p>Cowy Carnivory is a platform that connects food lovers with the best restaurants in their area. You can browse menus, read reviews, and order food for delivery or pickup.</p>
            </div>
        </div>

        <div class="faq">
            <div class="faq-toggle">
                <h3>How do I place an order?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-content">
                <p>To place an order, simply browse the restaurants available in your area, select the items you want, and proceed to checkout. You can pay online or choose cash on delivery.</p>
            </div>
        </div>

        <div class="faq">
            <div class="faq-toggle">
                <h3>What payment methods are accepted?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-content">
                <p>We accept various payment methods including credit/debit cards, PayPal, and cash on delivery.</p>
            </div>
        </div>

        <div class="faq">
            <div class="faq-toggle">
                <h3>How can I track my order?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-content">
                <p>Once your order is placed, you can track its status in real-time from the "My Orders" section in your account.</p>
            </div>
        </div>

        <div class="faq">
            <div class="faq-toggle">
                <h3>Can I cancel or modify my order?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-content">
                <p>Yes, you can cancel or modify your order within a limited time after placing it. Go to "My Orders" and select the order you want to change. If the restaurant has already started preparing your order, cancellation or modification may not be possible.</p>
            </div>
        </div>

        <div class="faq">
            <div class="faq-toggle">
                <h3>What should I do if there's an issue with my order?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-content">
                <p>If you encounter any issues with your order, please contact our customer support immediately. We will work to resolve the issue as quickly as possible.</p>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        document.querySelectorAll('.faq-toggle').forEach(toggle => {
            toggle.addEventListener('click', () => {
                const content = toggle.nextElementSibling;
                content.classList.toggle('open');
                const icon = toggle.querySelector('i');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            });
        });
    </script>

</body>
</html>
