<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage-Akademy</title>
    <style>
        body{
            font-family: sans-serif;
            text-align: center;
            padding: 100px;
            background-color: #f4f4f4;
            color: #333;
        }
    </style>
</head>
<body>
    <p><img height="200px" src="{{ asset('img/logo.png')}}" alt=""></p>
    <h1>Session expirée</h1>
    <p>Après une longue durée d'inactivité sur votre compte, vous devez authentifier à nouveau !...</p>
    <a href="{{route('login')}}">Connexion</a>
</body>
</html>