<!DOCTYPE html>
<html>
<head>
    <title>Return Request Submitted</title>
</head>
<body>
    <h1>Return Request Submitted</h1>

    <p>A return request has been submitted with the following details:</p>
    <li><strong>User ID:</strong> {{ $details['user_id'] }}</li>
    @foreach ($details as $key => $value)
        @if ($key !== 'user_id')
            <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
        @endif
    @endforeach
</ul>
</body>
</html>