   <main class="contenedor seccion">
        <h1>Contacto</h1>

        <?php if(isset($mensaje)): ?>
            <div class="alerta <?php echo $tipo; ?>">
                <?php echo s($mensaje); ?>
            </div>
        <?php endif; ?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture>

        <h2>Llene el formulario de Contacto</h2>

        <?php if(isset($errores) && !empty($errores)): ?>
            <?php foreach($errores as $error): ?>
                <div class="alerta error">
                    <?php echo s($error); ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" value="<?php echo isset($_POST['contacto']['nombre']) ? s($_POST['contacto']['nombre']) : ''; ?>" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="contacto[mensaje]" required><?php echo isset($_POST['contacto']['mensaje']) ? s($_POST['contacto']['mensaje']) : ''; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                <select id="opciones" name="contacto[tipo]" required>
                    <option value="" disabled <?php echo !isset($_POST['contacto']['tipo']) ? 'selected' : ''; ?>>-- Seleccione --</option>
                    <option value="Compra" <?php echo (isset($_POST['contacto']['tipo']) && $_POST['contacto']['tipo'] === 'Compra') ? 'selected' : ''; ?>>Compra</option>
                    <option value="Vende" <?php echo (isset($_POST['contacto']['tipo']) && $_POST['contacto']['tipo'] === 'Vende') ? 'selected' : ''; ?>>Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]" value="<?php echo isset($_POST['contacto']['precio']) ? s($_POST['contacto']['precio']) : ''; ?>" required>

            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" <?php echo (isset($_POST['contacto']['contacto']) && $_POST['contacto']['contacto'] === 'telefono') ? 'checked' : ''; ?> required>

                    <label for="contactar-email">E-mail</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" <?php echo (isset($_POST['contacto']['contacto']) && $_POST['contacto']['contacto'] === 'email') ? 'checked' : ''; ?> required>
                </div>

                <div id="contacto"></div>



            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>