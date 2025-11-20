<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
</head>
<body>
    <h1> Bienvenido, {{ $usuario -> nombres }} {{ $usuario -> apellidos }} </h1>
    <p> Su cuenta ha sido creada correctamente. A continuación, encontrará sus credenciales de acceso:</p>
    <p> Tu contraseñs temporal es: <strong>{{ $passwordTemporal}} </strong> </p>
    <p> Por favor, cambie su contraseña después de iniciar sesión por primera vez para garantizar la seguridad de su cuenta.</p>
    <p> Gracias por unirte con nosotros a parkcore. ¡Esperamos que tenga una experiencia excelente!</p>
    <p> Saludos cordiales.</p>

    <hr>
    <a href="{{ url('/login') }}">Iniciar sesión</a>
</body>
</html>