<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: url('https://img.freepik.com/foto-gratis/astronomia-cielo-nocturno-galactico-ciencia-combinada-ia-generativa_188544-9656.jpg?size=626&ext=jpg&ga=GA1.1.672697106.1718582400&semt=ais_user') no-repeat center center fixed; background-size: cover; color: #fff; min-height: 100vh; display: flex; flex-direction: column;">

    <nav class="navbar navbar-expand-lg navbar-dark" style="background: rgba(0, 0, 0, 0.7);">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-rocket"></i> WEBSITE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i> Registrar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content-container mt-5" style="flex-grow: 1; display: flex; flex-direction: column;">
        <div class="jumbotron text-center" style="background: rgba(0, 0, 0, 0.6); padding: 2rem 2rem; border-radius: 10px; margin-top: 2rem;">
            <i class="fas fa-rocket icon" style="font-size: 4rem; color: #007bff;"></i>
            <h1 class="display-4">Bienvenido a WEBSITE</h1>
            <p class="lead">Gestiona tus Proyectos y Recursos.</p>
            <hr class="my-4">
            <p>Registrate o inicia sesión para comenzar a usar nuestra plataforma.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Iniciar Sesión</a>
            <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Registrar</a>
        </div>

        <div class="row icon-section text-center" style="padding: 2rem 0; background: rgba(255, 255, 255, 0.9); border-radius: 10px; color: #000; margin-top: 2rem;">
            <div class="col-md-4">
                <i class="fas fa-cogs icon" style="font-size: 4rem; color: #007bff;"></i>
                <h3 class="mt-3">Funcionalidad</h3>
                <p>Nuestro Website ofrece una amplia gama de funcionalidades para facilitar la gestión de proyectos y recursos.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-shield-alt icon" style="font-size: 4rem; color: #007bff;"></i>
                <h3 class="mt-3">Seguridad</h3>
                <p>Nos tomamos la seguridad muy en serio, garantizando que tus datos estén siempre protegidos.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-users icon" style="font-size: 4rem; color: #007bff;"></i>
                <h3 class="mt-3">Comunidad</h3>
                <p>Únete a una comunidad de usuarios que comparten tus intereses y necesidades.</p>
            </div>
        </div>
    </div>

    <footer class="text-center" style="background: rgba(0, 0, 0, 0.7); color: #fff; padding: 1rem 0; position: relative; width: 100%; margin-top: auto;">
        <div class="container">
            <p>&copy; 2024 WEBSITE. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
