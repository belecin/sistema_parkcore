<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parkcore - Sistema de Estacionamiento</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('/images/estacionamiento_login.webp') center/cover no-repeat;            height: 100vh;
            display: flex;
            flex-direction: column;
            color: white;
        }
        body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: -1;
}

        /* Menú superior */
        .navbar {
            background: rgba(0, 0, 0, 0.7);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #ffcc00;
        }

        .btn-comenzar {
            background: #ffcc00;
            color: #000;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-comenzar:hover {
            background: #ffbb00;
            transform: scale(1.05);
        }

        /* Contenido principal */
        .hero {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
            max-width: 100%;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero h1 span {
            color: #ffcc00;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            max-width: 600px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .btn-primary {
            background: #ffcc00;
            color: #000;
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: #ffbb00;
            transform: scale(1.05);
        }

        .btn-secondary {
            background: transparent;
            color: #fff;
            padding: 12px 24px;
            border: 2px solid #fff;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,0.1);
            transform: scale(1.05);
        }

        /* Estadísticas */
        .stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #ffcc00;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #ddd;
        }

        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #aaa;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .stats {
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Menú superior -->
    <nav class="navbar">
        <a href="#" class="logo">🚗 HILARI PARK</a>
        <div class="nav-links">
            <a href="#">Inicio</a>
            <a href="#">Servicios</a>
            <a href="#">Nosotros</a>
            <a href="#">Contactos</a>
        </div>
        <a href="{{ route('login') }}" class="btn-comenzar">Comenzar</a>
    </nav>

    <!-- Contenido principal -->
    <main class="hero">
        <h1>Un Parqueo <span>Con Excelencia</span></h1>
        <p>Experimenta el futuro del parqueo con nuestro sistema inteligente, seguro y diseñado para ti.</p>
        <div class="hero-buttons">
            <a href="{{ route('login') }}" class="btn-primary">Explorar Soluciones →</a>
            <a href="#" class="btn-secondary">Ver Demo</a>
        </div>

        <!-- Estadísticas -->
        <div class="stats">
            <div class="stat-item">
                <div class="stat-number">Muchos</div>
                <div class="stat-label">Espacios Disponibles</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Disponibilidad</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">99.9%</div>
                <div class="stat-label">Tiempo Activo</div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        © {{ date('Y') }} Parkcore. Todos los derechos reservados.
    </footer>
</body>
</html>