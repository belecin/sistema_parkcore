<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido a ParkCore, {{ $usuario->nombres }} {{ $usuario->apellidos }}</h1>
    <p>Tu cuenta de usuario ha sido creada correctamente.</p>
    <p>Tu contraseña temporal es: <strong>{{ $passwordTemporal }}</strong></p>
    <p>Por favor, inicia sesión y cambia tu contraseña lo antes posible.</p>
    <p>Gracias por unirte a ParkCore.</p>

    <hr>
    <a href=" {{ url('/login') }} ">Iniciar Sesion</a>
</body>
</html>