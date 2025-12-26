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
            background: url('/images/estacionamiento_login.webp') center/cover repeat;             
            height: 100vh;
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
            background: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }

        /* Menú superior */
        .navbar {
            background: rgba(0, 0, 0, 0.7);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .logo {
            font-size: 1.2rem;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo i {
            font-size: 1.4rem;
            margin-right: 5px;
            color: #f3b64d;
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
            position: relative;
        }

        .nav-links a:hover {
            color: #f3b64d;
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #f3b64d;
        }

        .btn-comenzar {
            background: #f3b64d;
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

        /* Hero section (centrada) */
        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 20px;
            position: relative;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            line-height: 1.2;
        }

        .hero h1 span {
            color: #f3b64d;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            max-width: 600px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            line-height: 1.5;
        }

        .btn-primary {
            background: #f3b64d;
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
            color: #f3b64d;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #ddd;
        }

        /* Secciones adicionales */
        section {
            padding: 80px 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }

        .section-content {
            max-width: 800px;
            margin-top: 30px;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .service-card h3 {
            margin-bottom: 15px;
            color: #f3b64d;
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

            .stats {
                gap: 20px;
            }

            section {
                min-height: auto;
                padding: 60px 20px;
            }
        }
    </style>
</head>
<body>
     <!-- Menú superior -->
    <nav class="navbar">
        <a href="#" class="logo">🚗 PARK-CORE</a>
        <div class="nav-links">
            <a href="#inicio">Inicio</a>
            <a href="#servicios">Servicios</a>
            <a href="#nosotros">Nosotros</a>
            <a href="#contactos">Contactos</a>
        </div>
    </nav>

    <!-- Sección Hero (centrada) -->
    <section id="inicio" class="hero">
        <h1>ParkCore <br> <span>Donde la Tecnología Encuentra el Estacionamiento</span></h1>
        <p>El sistema inteligente que transforma cada espacio en una experiencia segura, eficiente y rentable.</p>
        <a href="{{ route('login') }}" class="btn-primary">Iniciar</a>

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
    </section>

    <!-- Sección Servicios -->
    <section id="servicios" style="background: rgba(0,0,0,0.8);">
        <h2 style="font-size: 2.5rem; margin-bottom: 30px;">Nuestros Servicios</h2>
        <div class="section-content">
            <p>En ParkCore ofrecemos soluciones integrales para la gestión eficiente de estacionamientos, combinando tecnología de punta con atención personalizada.</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <h3>Estacionamiento Inteligente</h3>
                <p>Sistema automatizado de control de espacios con asignación en tiempo real y monitoreo continuo de la ocupación.</p>
            </div>
            <div class="service-card">
                <h3>Gestión de Tickets</h3>
                <p>Generación automática de tickets, control de tiempos y cálculo inteligente de tarifas según el tipo de vehículo y duración.</p>
            </div>
            <div class="service-card">
                <h3>Facturación Digital</h3>
                <p>Emisión inmediata de facturas con soporte para diferentes tipos de tarifas y métodos de pago, perfecto para negocios modernos.</p>
            </div>
            <div class="service-card">
                <h3>Reportes Avanzados</h3>
                <p>Reportes detallados de ingresos, ocupación y rendimiento del estacionamiento por día, semana o mes para una mejor toma de decisiones.</p>
            </div>
        </div>
    </section>

    <!-- Sección Nosotros -->
    <section id="nosotros" style="background: rgba(0,0,0,0.7);">
        <h2 style="font-size: 2.5rem; margin-bottom: 30px;">Sobre Nosotros</h2>
        <div class="section-content">
            <p><strong>ParkCore</strong> es un sistema de gestión de estacionamiento moderno y eficiente, diseñado para optimizar el uso de espacios, mejorar la experiencia del cliente y maximizar los ingresos para los administradores.</p>
            <p style="margin-top: 20px;">Nuestra misión es proporcionar soluciones inteligentes que transformen la gestión de estacionamientos en una experiencia fluida, segura y rentable. Trabajamos con tecnología de vanguardia para garantizar confiabilidad y facilidad de uso.</p>
            <p style="margin-top: 20px;">Contamos con un equipo altamente calificado y comprometido con la excelencia en el servicio, asegurando que cada cliente reciba atención personalizada y soporte continuo.</p>
        </div>
    </section>

    <!-- Sección Contactos -->
    <section id="contactos" style="background: rgba(0,0,0,0.8);">
        <h2 style="font-size: 2.5rem; margin-bottom: 30px;">Contáctanos</h2>
        <div class="section-content">
            <p><strong>Dirección:</strong> Jiron Juli Nro 895, Puno, Perú</p>
            <p style="margin-top: 15px;"><strong>Teléfono:</strong> +51 958158232 / +51 951069916</p>
            <p style="margin-top: 15px;"><strong>Correo:</strong> parkcore68@gmail.com</p>
            <p style="margin-top: 15px;"><strong>Horario:</strong> Lunes a Domingo - 24 horas / 7 días</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        © {{ date('Y') }} Parkcore. Todos los derechos reservados.
    </footer>

    <script>
        // Actualizar clase 'active' al hacer scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-links a');
            
            let current = 'inicio';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (pageYOffset >= (sectionTop - 100)) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });

        // Scroll suave
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>