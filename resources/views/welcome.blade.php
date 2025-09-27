<x-layouts.app-adopt-pets
    :title="'Welcome - Adoptpets'"
    bodyClass="Welcome">
    @push('extra-css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    @endpush


        <section id="adoptpets">
            <div class="img-contenedor">
                <h1>AdoptPets</h1>
                <p>Adopta a tu alma gemela</p>
                <div class="botones-principales"> 
            </div>
            <div class="botonesnoticias">
                @guest
                    <a href="{{ route('register') }}" class="boton-principal">Comenzar Adopción</a>
                    <a href="#noticias" class="boton-secundario">Ver Noticias</a>
                @else
                    <a href="{{ route('dashboard') }}" class="boton-principal">Mi Dashboard</a>
                    <a href="#noticias" class="boton-secundario">Ver Noticias</a>
                @endguest
            </div>
        </section>
        
        

    <section id="noticias">
        <div class="contenedor-noticias">
            <h2 class="titulo-principal">Actualidad sobre adopción</h2>
            
            <div class="noticias-grid">
                <!-- Columna Izquierda - Noticia Principal + Contenido Adicional -->
                <div class="columna-izquierda">
                    <!-- Noticia Principal -->
                    <div class="noticia-principal">
                        <h3>Día Internacional de los Animales Callejeros: Mejor futuro para los abandonados</h3>
                        <p>
                            El Día Internacional de los Animales Callejeros, celebrado cada 4 de abril, busca concientizar sobre la difícil 
                            situación de millones de animales abandonados en el mundo. En Argentina, se estima que hay 8 millones de perros
                            y gatos en estado de abandono, mientras que a nivel global la cifra supera los 600 millones. Estos animales
                            enfrentan peligros, enfermedades, maltrato y una lucha constante por sobrevivir.
                        </p>
                        <img src="{{ asset('images/Wel_adopcion-virtual-animales.jpg') }}" alt="Noticia animales callejeros" />
                        <p>
                            La adopción es una solución clave, ya que brinda una segunda oportunidad a estos animales y alivia la sobrepoblación 
                            en refugios, muchos de los cuales carecen de espacio y recursos para atender a todos los necesitados. Además, los animales
                            rescatados suelen llegar con enfermedades, lesiones y traumas, lo que incrementa la presión sobre las organizaciones protectoras.
                            Adoptar en lugar de comprar no solo salva vidas, sino que es un acto de amor y solidaridad que transforma tanto a los animales 
                            como a las personas que les abren sus hogares. Sin embargo, se necesita más apoyo para mejorar las condiciones de los refugios 
                            y garantizar un futuro digno a estos seres vulnerables.
                        </p>
                        <div class="hashtags">
                            #AdoptaNoCompres #DíaDeLosAnimalesCallejeros
                        </div>
                    </div>

                    <!-- Contenido Adicional 1 -->
                    <div class="noticia-principal">
                        <h3>¿Por qué adoptar una mascota? 7 razones para considerarlo</h3>
                        <img src="{{ asset('images/perrosygatos.png') }}" alt="Perros y gatos para adopción" />
                        <p class="element-salvas-una-vida">
                            1.  Salvas una vida. <br />2. Te hacen compañía.<br />3. No apoyarás a tiendas que las venden. <br />4. Te
                                mantienen activo.&nbsp;&nbsp;<br />5. Le das oportunidad a otros. <br />6. Te ayudan a distraerte.<br />7.
                                Te brindan amor incondicional.
                        </p>
                        <a href="https://elcomercio.pe/wuf/consultorio/adoptar-mascota-7-razones-considerarlo-252458-noticia/?ref=ecr" class="link-fuente" target="_blank">
                            Fuente: El Comercio
                        </a>
                    </div>

                    <!-- Contenido Adicional 2 - Nueva noticia -->
                    <div class="noticia-principal">
                        <h3>¿Debería esterilizar a mi perro o gato adoptado?</h3>
                        <p>
                            Adoptar una mascota es una gran responsabilidad, y una de las decisiones más importantes que tomarás como dueño de una mascota es si esterilizar o no a su nuevo compañero. La esterilización, es la extirpación quirúrgica de los órganos reproductivos de un animal. En esta publicación, exploraremos los beneficios de esterilizar a su perro o gato adoptado y por qué es una decisión muy importante que debe tomar.
                        </p>
                        <img src="{{ asset('images/Esterilizar_mascotas.png') }}" alt="Esterilización de mascotas" />
                        <p>
                            Uno de los principales beneficios de esterilizar a su perro o gato adoptado es que puede ayudar a mejorar su salud en general. La esterilización puede ayudar a reducir el riesgo de ciertos tipos de cáncer, como el cáncer de mama en las hembras y el cáncer testicular en los machos. También puede reducir el riesgo de ciertos problemas de comportamiento, como la agresión y el marcaje de territorio.
                        </p>
                        <a href="https://www.adoptahoy.com/post/deber%C3%ADa-esterilizar-a-mi-perro-o-gato-adoptado" class="link-fuente" target="_blank">
                            Fuente: AdoptaHoy
                        </a>
                    </div>
                </div>

                <!-- Columna Derecha - Noticias Secundarias -->
                <div class="noticias-secundarias">
                    <h3 class="titulo-secundarias">También podría interesarte:</h3>
                <div class="noticia-card">
                    <h4>Jornada de adopción el 5 de abril de 2025</h4>
                    <p>
                        El Instituto Distrital de Protección y Bienestar Animal (IDPYBA) realizó una jornada de adopción el sábado 5 de abril 
                        en el Show Place Centro Comercial, ubicado en la Calle 147 # 7-70, de 11:00 a. m. a 4:00 p. m. Perros y gatos rescatados 
                        esperaban encontrar un hogar lleno de amor y cuidado.
                    </p>
                    <a href="https://bogota.gov.co/mi-ciudad/ambiente/jornada-de-adopcion-de-perros-y-gatos-en-bogota-5-de-abril-de-2025" class="link-noticia">
                        Leer más
                    </a>
                </div>

                <div class="noticia-card">
                    <h4>Cuatro jornadas de adopción en marzo de 2025</h4>
                    <p>
                        El IDPYBA organizó cuatro jornadas de adopción durante marzo, los días 15, 22, 29 y 30, en diferentes puntos de la ciudad, 
                        incluyendo el Centro Comercial Unicentro de Occidente y el Centro Felicidad (CEFE) de Chapinero.
                    </p>
                    <a href="https://www.eltiempo.com/bogota/oportunidad-para-adoptar-una-mascota-en-bogota-cuatro-jornadas-durante-marzo-3436153" class="link-noticia">
                        Leer más
                    </a>
                </div>

                <div class="noticia-card">
                    <h4>Jornadas de adopción en febrero de 2025</h4>
                    <p>
                        Se llevaron a cabo jornadas de adopción el 1 y 2 de marzo en el Centro Comercial Titán Plaza, donde los animales 
                        fueron entregados esterilizados, desparasitados, con el esquema de vacunación completo y con microchip de identificación.
                    </p>
                    <a href="https://bogota.gov.co/mi-ciudad/ambiente/en-titan-plaza-bogota-se-llevara-cabo-dos-jornadas-de-adopcion" class="link-noticia">
                        Leer más
                    </a>
                </div>

                <div class="noticia-card">
                    <h4>Plataforma digital para adopciones</h4>
                    <p>
                        En septiembre de 2024 se lanzó "Huellas que Salvan", una plataforma digital que conecta a perros y gatos en situación 
                        de vulnerabilidad con familias dispuestas a brindarles un hogar definitivo. En seis meses, ha establecido alianzas con 
                        12 fundaciones en seis ciudades de Colombia, incluyendo Bogotá.
                    </p>
                    <a href="https://360radio.com.co/plataforma-para-adoptar-perros-y-gatos-en-colombia/177993/" class="link-noticia">
                        Leer más
                    </a>
                </div>

                <div class="noticia-card">
                    <h4>Aumentan los casos de abandono de mascotas en parques del IDRD</h4>
                    <p>
                        En 2025, el Instituto Distrital de Recreación y Deporte (IDRD) de Bogotá ha registrado el abandono de cinco perros y dos gatos
                        en parques de la ciudad, una situación que afecta el bienestar animal y sobrepasa las capacidades de la entidad.
                    </p>
                    <a href="https://bogota.gov.co/mi-ciudad/cultura-recreacion-y-deporte/preocupacion-en-bogota-por-aumento-de-mascotas-abandonados-en-parques" class="link-noticia">
                        Leer más
                    </a>
                </div>

                <div class="noticia-card">
                    <h4>13 animales encontraron nuevo hogar en jornada de adopción en Theatron</h4>
                    <p>
                        Durante cinco horas decenas de personas llegaron a este lugar con el objetivo de brindar una nueva oportunidad a estos animalitos 
                        que sufrieron el dolor del abandono, el maltrato, el frío y el hambre en las calles de la ciudad.
                    </p>
                    <a href="https://bogota.gov.co/mi-ciudad/ambiente/13-animales-encontraron-nuevo-hogar-jornada-adopcion-theatron-bogota" class="link-noticia">
                        Leer más
                    </a>
                </div>

                <div class="noticia-card">
                    <h4>Bogotá abre convocatoria para la adopción de perros y caballos retirados de labores de servicio</h4>
                    <p>
                        Se adelantan acciones por la protección de los animales! Adopta un Héroe es un programa que busca dar un hogar definitivo
                        a diez equinos y tres caninos que cumplieron su ciclo de servicio a la ciudad.
                    </p>
                    <a href="https://bogota.gov.co/mi-ciudad/ambiente/bogota-abre-convocatoria-para-adopcion-de-perros-y-caballos-retirados" class="link-noticia">
                        Leer más
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Error link section -->
        <section>
            <div class="error">
                <a href="/error404" class="nav-link">Error de pagina</a>
            </div>
        </section>

</x-layouts.app-adopt-pets>