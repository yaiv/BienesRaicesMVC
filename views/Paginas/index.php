    
  <main class="contenedor seccion">
        <h1>Más sobre nosotros</h1>
        <?php include 'iconos.php'; ?>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta </h2>

        <?php 
            include 'listado_p.php';
        ?>



        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>LLena el formulario de contacto y un asesor se pondra en contacto contigo</p>
        <a href="contacto.php" class="boton-amarillo">Contactános</a>

    </section>

    <div class="contenedor seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>¿Por qué invertir en bienes raíces en 2025?</h4>
                        <p class="informacion-meta">Escrito el: <span>04/05/2025</span> por: <span>Yaiv</span></p>
                        <p> El crecimiento urbano, la demanda de vivienda y las nuevas políticas de desarrollo sostenible están generando oportunidades únicas para compradores e inversionistas.</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="Texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada2.php">
                        <h4>Consejos para comprar tu primera casa</h4>
                        <p class="informacion-meta">Escrito el: <span>04/05/2025</span> por: <span>Yaiv</span></p>
                        <p>Comprar tu primera casa puede parecer abrumador, pero con la preparación adecuada, el proceso puede ser mucho más sencillo.</p>
                    </a>
                </div>
            </article>
        </section> <!--Acaba seccion de Blog-->

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>-Yair Guerra</p>
            </div>
        </section>

    </div>