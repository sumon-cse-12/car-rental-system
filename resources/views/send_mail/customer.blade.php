<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
        }
        .email-header {
            text-align: center;
            padding: 20px 0;
            background-color: #0066cc;
            color: white;
        }
        .email-header img {
            width: 100px;
        }
        .email-body {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .email-footer {
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
            color: #999;
            border-top: 1px solid #ddd;
        }
        .user-info {
            padding: 15px;
            background-color: #f1f1f1;
            border-radius: 8px;
            margin-top: 10px;
        }
        .user-info strong {
            display: inline-block;
            width: 140px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Welcome to Car Rental</h2>
        </div>


        <div class="email-body">
            <p>Hello, <strong>{{ $rental->user->name }}</strong>,</p>
            <p>Thank you for booking car on our platform. Here are your details:</p>

            <div class="user-info">
                <strong>Car:</strong> {{ $rental->car->name }} ({{ $rental->car->brand }})
                <strong>Start Date:</strong> {{ $rental->start_date }}
                <strong>End Date:</strong> {{ $rental->end_date }}
                <strong>Total Cost:</strong> {{ $rental->total_cost }}
            </div>

            <p>If any of the above details are incorrect, please contact our support team.</p>
        </div>
        <div class="email-footer">
            <p>&copy; Car rental 2024. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
