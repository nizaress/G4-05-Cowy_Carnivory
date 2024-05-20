<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
</head>
<body>
    <h1>Payment Successful</h1>
    <p>Dear {{ $user->name }},</p>
    <p>Thank you for your payment. The total amount of {{ number_format($totalPrice, 2) }}€ has been successfully charged.</p>
    <p>We appreciate your order, enjoy your meal!</p>
    <p>Best regards,<br>Cowy Carnivory Team</p>
</body>
</html>
