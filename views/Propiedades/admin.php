    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>

    <?php 
        if($resultado){
            $mensaje = mostrarNotificacion( intval($resultado) );
             if($mensaje){ ?>
                     <p class="alerta exito"><?php echo s($mensaje)  ?></p>
            <?php }
        }
    ?>


           
     

        <a href="/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo Vendedor</a>
        <a href="/articulos/crear" class="boton boton-verde">Nuevo Entrada</a>
        <a href="/crearuser" class="boton boton-amarillo">Nuevo Usuario</a>



        <h2>Propiedades</h2>

            <table class="propiedades">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody> <!--Se muestran los resultados de la BD-->
                <!--Se crea codigo que va a iterar en la BD -->
                <?php foreach( $propiedades as $propiedad): ?> 
                    <tr>
                        <td> <?php echo $propiedad->id; ?> </td>
                        <td> <?php echo $propiedad->titulo; ?> </td>
                        <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"> </td>
                        <td>$ <?php echo $propiedad->precio; ?> </td>
                        <td>
                            <form method="POST" class="w-100" action="/propiedades/eliminar">

                                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>" >
                                
                                <input type="hidden" name="tipo" value="propiedad" >

                            
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block ">Actualizar</a>
                        </td>
                    </tr>
                    
                    <?php  endforeach; ?>

                </tbody>
            </table>

                     <h2>Vendedores</h2>

            <table class="propiedades">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody> <!--Se muestran los resultados de la BD-->
                <!--Se crea codigo que va a iterar en la BD -->
                <?php foreach( $vendedores as $vendedor): ?> 
                    <tr>
                        <td> <?php echo $vendedor->id; ?> </td>
                        <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </td>
                        <td> <?php echo $vendedor->telefono; ?> </td>
                        <td>
                            <form method="POST" class="w-100" action="/vendedores/eliminar">

                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>" >

                                <input type="hidden" name="tipo" value="vendedor" >


                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            <a href="vendedores/actualizar? id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block ">Actualizar</a>
                        </td>
                    </tr>
                    
                    <?php  endforeach; ?>

                </tbody>
            </table>

            <h2>Entradas</h2>

<table class="propiedades">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Autor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody> <!--Se muestran los resultados de la BD-->
    <!--Se crea codigo que va a iterar en la BD -->
    <?php foreach( $articulos as $articulo): ?> 
        <tr>
            <td> <?php echo $articulo->id; ?> </td>
            <td> <?php echo $articulo->titulo; ?> </td>
            <td> <img src="/imagenes/<?php echo $articulo->imagen; ?>" class="imagen-tabla"> </td>
            <td> <?php echo $articulo->autor; ?> </td>
            <td>
                <form method="POST" class="w-100" action="/articulos/eliminar">

                    <input type="hidden" name="id" value="<?php echo $articulo->id; ?>" >

                    <input type="hidden" name="tipo" value="articulo" >


                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                </form>
                <a href="articulos/actualizar? id=<?php echo $articulo->id; ?>" class="boton-amarillo-block ">Actualizar</a>
            </td>
        </tr>
        
        <?php  endforeach; ?>

    </tbody>
</table>
    </main>