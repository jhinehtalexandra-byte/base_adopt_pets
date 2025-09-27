<x-layouts.app-adopt-pets
    :title="'usuarios'"
    bodyClass="usuarios">

    

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Noto Sans', sans-serif;
        }

        body {
            background: #ffffff;
            font-family: 'Noto Sans', sans-serif;
            min-height: 100vh;
        }

        

        

        .boton {
            background: linear-gradient(135deg, #22C55E, #1B9E4B);
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .boton:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(34, 197, 94, 0.4);
        }

        /* Content Styles */
        main {
            padding: 30px 20px;
        }

        .contenido {
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero-section {
            text-align: center;
            padding: 60px 0;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border-radius: 20px;
            margin-bottom: 60px;
        }

        .hero-section h1 {
            font-size: 3.5em;
            color: #22C55E;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .hero-section p {
            font-size: 1.3em;
            color: #137035;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .mision-vision {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 60px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #22C55E;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            color: #137035;
            font-size: 2em;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .card p {
            color: #333;
            font-size: 1.1em;
            line-height: 1.6;
        }

        .valores {
            background: #f8fffe;
            padding: 60px 40px;
            border-radius: 20px;
            margin-bottom: 60px;
        }

        .valores h2 {
            text-align: center;
            color: #137035;
            font-size: 2.5em;
            margin-bottom: 40px;
        }

        .valores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .valor-item {
            text-align: center;
            padding: 30px 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .valor-icon {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .valor-item h3 {
            color: #137035;
            font-size: 1.3em;
            margin-bottom: 15px;
        }

        .estadisticas {
            background: linear-gradient(135deg, #22C55E, #1B9E4B);
            color: white;
            padding: 60px 40px;
            border-radius: 20px;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
        }

        .stat-item h3 {
            font-size: 3em;
            margin-bottom: 10px;
        }

        .stat-item p {
            font-size: 1.2em;
            opacity: 0.9;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #137035, #1B9E4B);
            color: white;
            text-align: center;
            padding: 40px 20px;
            margin-top: 60px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5em;
            }

            .mision-vision {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .card {
                padding: 30px 20px;
            }

            .valores {
                padding: 40px 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>




    <!-- Main Content -->
    <main>
        <div class="contenido">
            <!-- Hero Section -->
            <section class="hero-section">
                <h1>¿Quiénes Somos?</h1>
                <p>
                    Somos una plataforma dedicada a conectar corazones, creando puentes entre mascotas abandonadas 
                    y familias que buscan un compañero fiel. Nuestra misión es transformar vidas a través del amor incondicional.
                </p>
            </section>

            <!-- Misión y Visión -->
            <section class="mision-vision">
                <div class="card">
                    <h2>
                        <span style="color: #22C55E;">🎯</span>
                        Nuestra Misión
                    </h2>
                    <p>
                        Facilitar procesos de adopción responsable, conectando mascotas en situación de abandono 
                        con familias que les brinden amor, cuidado y un hogar permanente. Promovemos la adopción 
                        como primera opción frente a la compra, contribuyendo a reducir el abandono animal.
                    </p>
                </div>

                <div class="card">
                    <h2>
                        <span style="color: #22C55E;">👁️</span>
                        Nuestra Visión
                    </h2>
                    <p>
                        Ser la plataforma líder en adopción de mascotas, donde ningún animal permanezca sin hogar 
                        y cada familia encuentre a su compañero ideal. Aspiramos a crear una sociedad más consciente 
                        y responsable con el bienestar animal.
                    </p>
                </div>
            </section>

            <!-- Valores -->
            <section class="valores">
                <h2>Nuestros Valores</h2>
                <div class="valores-grid">
                    <div class="valor-item">
                        <div class="valor-icon">❤️</div>
                        <h3>Amor y Compasión</h3>
                        <p>Creemos en el poder transformador del amor incondicional entre mascotas y familias.</p>
                    </div>

                    <div class="valor-item">
                        <div class="valor-icon">🤝</div>
                        <h3>Responsabilidad</h3>
                        <p>Promovemos la adopción responsable y el compromiso a largo plazo con nuestras mascotas.</p>
                    </div>

                    <div class="valor-item">
                        <div class="valor-icon">🌟</div>
                        <h3>Transparencia</h3>
                        <p>Mantenemos procesos claros y honestos en cada adopción para garantizar el mejor match.</p>
                    </div>

                    <div class="valor-item">
                        <div class="valor-icon">🌍</div>
                        <h3>Compromiso Social</h3>
                        <p>Trabajamos por una sociedad más consciente sobre el bienestar animal y la adopción.</p>
                    </div>
                </div>
            </section>

            <!-- Estadísticas -->
            <section class="estadisticas">
                <h2 style="margin-bottom: 40px;">Nuestro Impacto</h2>
                <div class="stats-grid">
                    <div class="stat-item">
                        <h3>500+</h3>
                        <p>Mascotas Adoptadas</p>
                    </div>

                    <div class="stat-item">
                        <h3>300+</h3>
                        <p>Familias Felices</p>
                    </div>

                    <div class="stat-item">
                        <h3>50+</h3>
                        <p>Refugios Aliados</p>
                    </div>

                    <div class="stat-item">
                        <h3>98%</h3>
                        <p>Adopciones Exitosas</p>
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-layouts.app-adopt-pets>