            <fieldset>
                <legend>Informacion General:</legend>

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre Vendedo(a)" value="<?php echo s($vendedor->nombre);?>">

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido Vendedor(a)" value="<?php echo s($vendedor->apellido)
                ;?>">

            </fieldset>

            <fieldset>

            <legend>Información extra</legend>
                
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Telefono" value="<?php echo s($vendedor->telefono);?>">


            </fieldset>