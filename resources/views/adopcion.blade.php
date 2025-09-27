<x-layouts.app-adopt-pets
    :title="'Adopcion - Adoptpets'"
    bodyClass="Adopcion">
    @push('extra-css')
    <link rel="stylesheet" href="{{ asset('css/adopcion.css') }}">
    @endpush

    <section id="adoptpets">
        <div class="img-contenedor">
            <h1>Mascotas</h1>
            <p>Encuentra a tu compañero perfecto</p>
        </div>
    </section>
    
    <section id="filtros">
        <div class="contenedor">
            <div class="filtros-container">
                <div class="filtro-grupo">
                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipo">
                        <option value="">Todos</option>
                        <option value="perro">Perro</option>
                        <option value="gato">Gato</option>
                    </select>
                </div>
                
                <div class="filtro-grupo">
                    <label for="edad">Edad:</label>
                    <select id="edad" name="edad">
                        <option value="">Todas</option>
                        <option value="cachorro">Cachorro</option>
                        <option value="joven">Joven</option>
                        <option value="adulto">Adulto</option>
                    </select>
                </div>
                
                <div class="filtro-grupo">
                    <label for="tamaño">Tamaño:</label>
                    <select id="tamaño" name="tamaño">
                        <option value="">Todos</option>
                        <option value="pequeño">Pequeño</option>
                        <option value="mediano">Mediano</option>
                        <option value="grande">Grande</option>
                    </select>
                </div>
                
                <div class="filtro-grupo">
                    <label for="genero">Género:</label>
                    <select id="genero" name="genero">
                        <option value="">Todos</option>
                        <option value="macho">Macho</option>
                        <option value="hembra">Hembra</option>
                    </select>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Mascotas Section -->
    <section id="mascotas">
        <div class="contenedor">
            <div class="mascotas-grid">
                <!-- Mascota 1 -->
                <div class="mascota-card">
                    <div class="mascota-imagen">
                        <img src="{{ asset('images/gato1.jpg') }}" alt="Thomas - Gato Criollo" />
                        <div class="estado-badge disponible">Disponible</div>
                    </div>
                    <div class="mascota-info">
                        <h3 class="nombre">Thomas</h3>
                        <div class="detalles">
                            <p><strong>Género:</strong> Macho</p>
                            <p><strong>Raza:</strong> Criollo</p>
                            <p><strong>Estado de salud:</strong> Saludable</p>
                            <p><strong>Nivel de energía:</strong> Medio</p>
                        </div>
                        <div class="acciones">
                            <a href="{{ route('formulario') }}" class="btn-adoptar">Adoptar</a>
                            <button class="btn-info">En adopción</button>
                            <button class="btn-apadrinar">Sin apadrinar</button>
                        </div>
                    </div>
                </div>

                <!-- Mascota 2 -->
                <div class="mascota-card">
                    <div class="mascota-imagen">
                        <img src="{{ asset('images/gato2.jpg') }}" alt="Luna - Gata Criolla" />
                        <div class="estado-badge disponible">Disponible</div>
                    </div>
                    <div class="mascota-info">
                        <h3 class="nombre">Luna</h3>
                        <div class="detalles">
                            <p><strong>Género:</strong> Hembra</p>
                            <p><strong>Raza:</strong> Criolla</p>
                            <p><strong>Estado de salud:</strong> Saludable</p>
                            <p><strong>Nivel de energía:</strong> Medio</p>
                        </div>
                        <div class="acciones">
                            <a href="{{ route('formulario') }}" class="btn-adoptar">Adoptar</a>
                            <button class="btn-info">En adopción</button>
                            <button class="btn-apadrinar">Sin apadrinar</button>
                        </div>
                    </div>
                </div>

                <!-- Mascota 3 -->
                <div class="mascota-card">
                    <div class="mascota-imagen">
                        <img src="{{ asset('images/perrito2.jpg') }}" alt="Max - Perro Criollo" />
                        <div class="estado-badge adoptado">Adoptado</div>
                    </div>
                    <div class="mascota-info">
                        <h3 class="nombre">Max</h3>
                        <div class="detalles">
                            <p><strong>Género:</strong> Macho</p>
                            <p><strong>Raza:</strong> Criollo</p>
                            <p><strong>Estado de salud:</strong> Saludable</p>
                            <p><strong>Nivel de energía:</strong> Medio</p>
                        </div>
                        <div class="acciones">
                            <span class="btn-adoptar disabled">Adoptado</span>
                            <button class="btn-info">En adopción</button>
                            <button class="btn-apadrinar">Sin apadrinar</button>
                        </div>
                    </div>
                </div>

                <!-- Mascota 4 -->
                <div class="mascota-card">
                    <div class="mascota-imagen">
                        <img src="{{ asset('images/perrito3.png') }}" alt="Bella - Perra Criolla" />
                        <div class="estado-badge disponible">Disponible</div>
                    </div>
                    <div class="mascota-info">
                        <h3 class="nombre">Bella</h3>
                        <div class="detalles">
                            <p><strong>Género:</strong> Hembra</p>
                            <p><strong>Raza:</strong> Criolla</p>
                            <p><strong>Estado de salud:</strong> Saludable</p>
                            <p><strong>Nivel de energía:</strong> Medio</p>
                        </div>
                        <div class="acciones">
                            <a href="{{ route('formulario') }}" class="btn-adoptar">Adoptar</a>
                            <button class="btn-info">En adopción</button>
                            <button class="btn-apadrinar">Sin apadrinar</button>
                        </div>
                    </div>
                </div>

                <!-- Mascota 5 -->
                <div class="mascota-card">
                    <div class="mascota-imagen">
                        <img src="{{ asset('images/perrito4.jpg') }}" alt="Rocky - Perro Criollo" />
                        <div class="estado-badge disponible">Disponible</div>
                    </div>
                    <div class="mascota-info">
                        <h3 class="nombre">Rocky</h3>
                        <div class="detalles">
                            <p><strong>Género:</strong> Macho</p>
                            <p><strong>Raza:</strong> Criollo</p>
                            <p><strong>Estado de salud:</strong> Saludable</p>
                            <p><strong>Nivel de energía:</strong> Medio</p>
                        </div>
                        <div class="acciones">
                            <a href="{{ route('formulario') }}" class="btn-adoptar">Adoptar</a>
                            <button class="btn-info">En adopción</button>
                            <button class="btn-apadrinar">Sin apadrinar</button>
                        </div>
                    </div>
                </div>

                <!-- Mascota 6 -->
                <div class="mascota-card">
                    <div class="mascota-imagen">
                        <img src="{{ asset('images/gato3.jpg') }}" alt="Mimi - Gata Criolla" />
                        <div class="estado-badge disponible">Disponible</div>
                    </div>
                    <div class="mascota-info">
                        <h3 class="nombre">Mimi</h3>
                        <div class="detalles">
                            <p><strong>Género:</strong> Hembra</p>
                            <p><strong>Raza:</strong> Criolla</p>
                            <p><strong>Estado de salud:</strong> Saludable</p>
                            <p><strong>Nivel de energía:</strong> Medio</p>
                        </div>
                        <div class="acciones">
                            <a href="{{ route('formulario') }}" class="btn-adoptar">Adoptar</a>
                            <button class="btn-info">En adopción</button>
                            <button class="btn-apadrinar">Sin apadrinar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="contenedor">
            <p>&copy; 2025 AdoptPets - Todos los derechos reservados</p>
        </div>
    </footer>

    <!-- Error link section -->
    <section>
        <div class="error">
            <a href="/error404" class="nav-link">Error de pagina</a>
        </div>
    </section>
</x-layouts.app-adopt-pets>
