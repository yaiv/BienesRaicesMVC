<div class="contenedor-anuncios">
            <?php foreach($propiedades as $propiedad){ ?>
            <div class="anuncio">

                    <img class="img-anuncios" src="/imagenes/<?php echo $propiedad->imagen;?>" alt="anuncio">
                
                <div class="contenido-anuncio">
                    <h4 class="titulos"><?php echo $propiedad->titulo;?></h4>
                    <p><?php echo $propiedad->descripcion;?></p>
                    <p class="precio">$<?php echo $propiedad->precio;?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                            <p><?php echo $propiedad->wc;?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
                            <p><?php echo $propiedad->estacionamiento;?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono Dormitorio">
                            <p><?php echo $propiedad->habitaciones;?></p>
                        </li>
                    </ul>

                    <a href="/propiedad?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Ver Propiedad</a>
                </div> <!--Fin contenido-anuncio-->
            </div> <!--Fin anuncio-->

        <?php  } ?>
        </div> <!--Fin contenedor-anuncios-->