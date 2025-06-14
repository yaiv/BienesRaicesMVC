<main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>

        <?php foreach($articulos as $articulo): ?>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="/imagenes/<?php echo $articulo->imagen; ?>" type="image/jpeg">
                    <img loading="lazy" src="/imagenes/<?php echo $articulo->imagen; ?>" alt="Imagen del artículo">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada?id=<?php echo $articulo->id; ?>">
                    <h4><?php echo s($articulo->titulo); ?></h4>
                    <p class="informacion-meta">Escrito el: <span><?php echo s($articulo->fecha); ?></span> por: <span><?php echo s($articulo->autor); ?></span> </p>
                    <p>
                        <?php echo s(substr($articulo->contenido, 0, 100)) . '...'; ?>
                    </p>
                </a>
            </div>
        </article>
        <?php endforeach; ?>
    </main>