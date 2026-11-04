<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Río Claro</title>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>

<nav class="navbar navbar-dark bg-primary">

    <a class="navbar-brand">

        Río Claro

    </a>

    <a href="{{ route('login') }}"
       class="btn btn-light">

        Ingresar

    </a>

</nav>

<div class="container mt-5">

    <div class="jumbotron">

        <h1 class="display-4">

            Sistema Inteligente Río Claro

        </h1>

        <p class="lead">

            Gestión de inventarios, proveedores,
            facturación e inteligencia artificial.

        </p>

        <hr>

        <a href="{{ route('login') }}"
           class="btn btn-primary btn-lg">

            Entrar al sistema

        </a>

    </div>

</div>

</body>

</html>