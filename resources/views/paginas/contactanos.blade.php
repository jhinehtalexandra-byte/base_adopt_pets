<x-layouts.app-adopt-pets
  :title="'Contactanos- Adoptpets'"
  bodyClass="Contactanos">
  @push('extra-css')
  <link rel="stylesheet" href="{{ asset('css/contactanos.css') }}">
  @endpush

    <section id="contactanos" class="py-10">
        <div class="contenedor">
            <div class="textocontacto">
                <div class="texto">
                    <h2>Contáctanos</h2>
                    <p>
                        Estamos aquí para ayudar y responder cualquier pregunta que tengas.  
                        Encontraremos la forma de responderla.
                    </p>

                    <p class="texto2">
                        Otras formas de contactarnos:
                    </p>

                    <ul class="texto3">
                        <li><strong>Teléfono:</strong> 239812910010</li>
                        <li><strong>Correo:</strong> adoptpets@example.com</li>
                        <li><strong>Dirección:</strong> Calle 156 # 58-26 Bogotá-Colombia</li>
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
                    <label for="correo">Correo Electrónico:</label>
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
</x-layouts.app-adopt-pets>