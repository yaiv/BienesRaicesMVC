<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="articulo[titulo]" placeholder="Título Artículo" value="<?php echo s($articulo->titulo); ?>">

    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="articulo[autor]" placeholder="Autor del Artículo" value="<?php echo s($articulo->autor); ?>">

    <label for="fecha">Fecha de Publicación:</label>
    <input type="date" id="fecha" name="articulo[fecha]" value="<?php echo s($articulo->fecha); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="articulo[imagen]" accept="image/jpeg, image/png">

    <?php if($articulo->imagen): ?>
        <img src="/imagenes_articulos/<?php echo $articulo->imagen ?>" class="imagen-small">
    <?php endif; ?>

    <label for="contenido">Contenido:</label>
    <textarea id="contenido" name="articulo[contenido]"><?php echo s($articulo->contenido); ?></textarea>

</fieldset>
