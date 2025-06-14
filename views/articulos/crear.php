<main class="contenedor seccion">
        <h1>Nueva entrada de Blog</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <a href="/admin" class="boton boton-verde">volver</a>


        <form class="formulario" method="POST" enctype="multipart/form-data" action="/articulos/crear">
            <?php  include __DIR__ . '/formulario_a.php'; ?>

        <input type="submit" value="Crear Entrada" class="boton boton-verde"> 

        </form>

  </main>