<?php 

namespace Controllers;
use MVC\Router;
use Model\Articulo;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

class ArticuloController {


    public static function crear( Router $router ){

        $articulo = new Articulo;

        $errores = Articulo::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //Crea una nueva instancia con los datos enviados 
            $articulo = new Articulo($_POST['articulo']);
        
        
            //Generar nombre de imagen unico 
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
        
            //Procesar imagen solo si se subio
            //Satear la imagen
            //Realizar un resize a la imagen con intervention
            if($_FILES['articulo']['tmp_name']['imagen']){ //Se revisa si existe la imagen 
                //  Asignar nombre del objeto
                $articulo->setImagen($nombreImagen);
                //crear imagen usando intervention
                $manager = new Image(Driver::class); //Configuracion Driver
                $imagen = $manager->read($_FILES['articulo']['tmp_name']['imagen'])->cover(800, 600); //Se leer la imagen y se le realiza una transformacion
                
            }
        
        
                //Validar campos
             $errores = $articulo->validar();
             //debuguear($articulo);
        
           // debuguear($_FILES);
            
            if(empty($errores)){
                //Subida de archivos (imagenes)
                //Se tiene en funciones 
                //Se verifica que exista la carpeta, si no se crea  
                if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
                }
        
              // Guardar imagen en el servidor si fue procesada
              //  if (isset($imagen)) {
                    $imagen->save(CARPETA_IMAGENES . $nombreImagen);
             //   }
        
                    //Se gurda en la BD 
                $articulo->guardar();
        
                }
        
            }
        
        
        $router->render('articulos/crear', [
            'errores' => $errores, 
            'articulo' => $articulo

        ]);

    }

    public static function actualizar(  ){
        echo "Actualizar articulo";

    }

    public static function eliminar(  ){
        echo "Eliminar Articulo";

    }
}