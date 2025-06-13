<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Email UI Tool</title>
</head>
<body>
    <h1>FRONTEND PAGE FOR EMAIL UI TOOL</h1>

    @auth
        <p>Welcome, {{ Auth::user()->first_name }}!</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger" type="submit">Log Out</button>
        </form>
    @else
        <p>Welcome, Guest!</p>
        <a class="btn btn-info" href="{{ route('login') }}">Login</a>
    @endauth
</body>

</html>
