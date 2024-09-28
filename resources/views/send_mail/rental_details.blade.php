<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Rental Alert</title>
</head>
<body>
    <h3>New Car Rental Alert</h3>
    <p>The following car has been rented by {{ $rental->user->name }}:</p>


        <strong>Car:</strong> {{ $rental->car->name }} ({{ $rental->car->brand }})
        <strong>Start Date:</strong> {{ $rental->start_date }}
        <strong>End Date:</strong> {{ $rental->end_date }}
        <strong>Total Cost:</strong> {{ $rental->total_cost }}

</body>
</html>
