    
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
            <?php include 'listado_a.php'; ?>


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