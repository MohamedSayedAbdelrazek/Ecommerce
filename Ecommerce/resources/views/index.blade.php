<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light" style="background: linear-gradient(to right, #e00034 0%, #d00070 20%,
            #a400c7 50%, #4a1fdc 75%, #0047ff 100%);">
    <div class="container min-vh-100 d-flex align-items-center">
        <div class="row w-100">
            <div class="col-md-6 mb-4 mb-md-0 d-flex flex-column justify-content-center">
                <h1 class="mb-3">Welcome to our store</h1>
                <p class="text-muted">Browse products, manage your account, and enjoy seamless shopping.</p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-md-end justify-content-start">
                <a class="btn btn-primary btn-lg" href="{{ route('get-started') }}">Get Started</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

