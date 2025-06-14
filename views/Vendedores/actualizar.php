    <main class="contenedor seccion">
        <h1>Actualizar Vendedor(a)</h1>

        <a href="/admin" class="boton boton-verde">volver</a>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
            <?php endforeach; ?>


        <form class ="formulario" method="POST">  <!--Se habilita enctype para que se lean los archivos-->

            <?php include 'formulario_v.php'?>

            <input type="submit" value="Guardar Cambios" class="boton boton-verde"> 

        </form>

    </main>