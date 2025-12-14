<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentication')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            background: linear-gradient(to right, #e00034 0%, #d00070 20%,
                    #a400c7 50%, #4a1fdc 75%, #0047ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 20px;
        }

        .auth-card {
            width: 100%;
            max-width: 420px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            background: white;
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
