    <main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>

        <a href="/admin" class="boton boton-verde">volver</a>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
            <?php endforeach; ?>


        <form class ="formulario" method="post" action="/vendedores/crear">  <!--Se habilita enctype para que se lean los archivos-->

            <?php include 'formulario_v.php'; ?>

            <input type="submit" value="Registrar Vendedores" class="boton boton-verde"> 

        </form>

    </main>