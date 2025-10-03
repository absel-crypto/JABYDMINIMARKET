include 'header.php'; // Incluye el header
?>

<main>
    <section class="contacto">
        <h1>Contáctanos</h1>
        <p>En Minimarket JABYD siempre estamos atentos a resolver tus dudas y atender tus pedidos.</p>

        <div class="info-contacto">
            <h2>Información de contacto</h2>
            <ul>
                <li><strong>Teléfono fijo:</strong> (578) 654 3210</li>
                <li><strong>WhatsApp:</strong> +57 322 533 0875</li>
                <li><strong>Email:</strong> minimarket@jabydloma.com</li>
                <li><strong>Dirección:</strong> Carrera 12 #34-56, La Loma, Cesar, Colombia</li>
            </ul>
        </div>

        <div class="formulario-contacto">
            <h2>Envíanos un mensaje</h2>
            <form action="enviar_mensaje.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" id="email" required>

                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" id="mensaje" rows="5" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </div>

        <div class="mapa">
            <h2>Encuéntranos aquí</h2>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.999999999!2d-73.210123!3d9.147890!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e657a0000000000%3A0x0000000000000000!2sLa%20Loma%2C%20Cesar!5e0!3m2!1ses!2sco!4v1234567890" 
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </section>
</main>

<?php
include 'footer.php'; // Incluye el footer