@extends('dashboard')

@section('title', 'contactos')

@section('body-class', 'contactos')

@section('extra-css')
    <style>
        {!! file_get_contents(resource_path('css/contactanos.css')) !!}
    </style>
@endsection

@section('contenido')

        <!-- Contact Section -->
        <section id="contactanos">
            <div class="contenedor">
                <div class="textocontacto">
                    <div class="texto">
                        <h2>Contáctanos</h2>
                        <p>Estamos aquí para ayudar y responder
                        cualquier pregunta que tengas, 
                        encontraremos la forma de responderla.
                        </p>

                        <p class="texto2">
                            Otras formas de contactarnos
                        </p>

                        <ul class="texto3">
                            <li>Telefono: 239812910010</li>
                            <li>Correo: adoptpets@example.com</li>
                            <li>Dirección: Calle 156 # 58-26 Bogotá-Colombia</li>
                        </ul>
                    </div>
                </div>
                
                <form class="formulario" action="#" method="POST">
                    @csrf
                    <div class="nombresfila">
                        <div class="campo">
                            <label for="nombres">Nombres:</label>
                            <input type="text" id="nombres" name="nombres" required>
                        </div>

                        <div class="campo">
                            <label for="apellido">Apellidos:</label>
                            <input type="text" id="apellido" name="apellidos" required>
                        </div>
                    </div>
                    
                    <div class="campo">
                        <label for="correo">Correo Electronico:</label>
                        <input type="email" id="correo" name="correo" required>
                    </div>

                    <div class="campo">
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" required></textarea>
                    </div>

                    <div class="botonenviar">
                        <button type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </section>
@endsection