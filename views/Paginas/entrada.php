<main class="contenedor seccion contenido-centrado">
        <h1 class="titulos"><?php echo s($articulo->titulo); ?></h1>

   
        <picture>
            <source srcset="/imagenes/<?php echo $articulo->imagen; ?>" type="image/jpeg">
            <img loading="lazy" src="/imagenes/<?php echo $articulo->imagen; ?>" alt="imagen del artículo">
        </picture>

        <p class="informacion-meta">Escrito el: <span><?php echo s($articulo->fecha); ?></span> por: <span><?php echo s($articulo->autor); ?></span> </p>


        <div class="resumen-propiedad">
            <?php echo nl2br(s($articulo->contenido)); ?>
        </div>
    </main>
