<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 text-white">
    <div class="container text-center p-4 bg-dark bg-opacity-50 rounded w-50">
        <h1>🌍 Weather App</h1>
        <form method="GET" action="{{ route('weather') }}">
            <input type="text" name="city" class="form-control my-2" placeholder="Enter City" required>
            <button type="submit" class="btn btn-primary w-100">Get Weather</button>
        </form>

        @if(isset($weather['main']))
            <div class="mt-4">
                <h2>Weather in {{ $city }}</h2>
                <p class="display-4">🌦️</p>
                <p class="fs-4">🌡️ {{ $weather['main']['temp'] }}°C</p>
                <p class="fs-5">💧 {{ $weather['main']['humidity'] }}%</p>
                <p class="fs-5">🌦️ {{ ucfirst($weather['weather'][0]['description']) }}</p>
            </div>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
