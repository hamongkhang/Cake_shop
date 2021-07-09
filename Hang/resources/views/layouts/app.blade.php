<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sending Email with Laravel Mailer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f714ee491f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-md bg-light navbar-light">
            <a class="navbar-brand" href="#">Tasks</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            </div>
        </nav>
        <br>
        @yield('content')
    </div>
</body>
</html>