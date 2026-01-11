<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Delivery Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #4CAF50;
            text-align: center;
            padding: 20px;
        }
        .header img {
            max-width: 150px;
            height: auto;
        }
        .content {
            padding: 20px;
            color: #333;
        }
        .content h1 {
            font-size: 24px;
            color: #333;
        }
        .content p {
            font-size: 16px;
            color: #666;
        }
        .content h2 {
            font-size: 20px;
            color: #333;
            margin-top: 20px;
        }
        .content ul {
            list-style-type: none;
            padding-left: 0;
        }
        .content li {
            font-size: 16px;
            color: #666;
            margin-bottom: 8px;
        }
        .footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #777;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
        /* Make the email mobile-responsive */
        @media (max-width: 600px) {
            .email-container {
                width: 100% !important;
            }
            .header img {
                max-width: 120px;
            }
            .content {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header with Logo -->
        <div class="header">
            <a href="https://imgbb.com/"><img src="https://i.ibb.co/rQRgHRh/lugu.png" alt="lugu" border="0" /></a>
        </div>

        <!-- Email Content -->
        <div class="content">
            <h1>Hi {{ $order->customer->name }},</h1>
            <p>Your order with ID <strong>{{ $order->id }}</strong> is on its way!</p>

            <h2>Order Details</h2>
            <ul>
                <li><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</li>
                <li><strong>Total Amount:</strong> ₱{{ number_format($order->total(), 2) }}</li>
                <li><strong>Received Amount:</strong> ₱{{ number_format($order->receivedAmount(), 2) }}</li>
            </ul>

            <h2>Items:</h2>
            <ul>
                @foreach ($order->items as $item)
                    <li>
                        {{ $item->product->name }} - {{ $item->quantity }} x
                        ₱{{ number_format($item->price / $item->quantity, 2) }} =
                        ₱{{ number_format($item->price, 2) }}
                    </li>
                @endforeach
            </ul>

            <h2>Payments:</h2>
            <ul>
                @foreach ($order->payments as $payment)
                    <li>
                        Payment of ₱{{ number_format($payment->amount, 2) }} made on
                        {{ $payment->created_at->format('M d, Y H:i') }}
                    </li>
                @endforeach
            </ul>

            <p>Thank you for shopping with us!</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2024 JustDrink.</p>
        </div>
    </div>
</body>
</html>
