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

    public static function actualizar( Router $router ){
        
        $id = validarORedireccionar('/admin');
        $articulo = Articulo::find($id);

        $errores = Articulo::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //Asignar los atributos 

            $args = $_POST['articulo'];

            $articulo->sincronizar($args);

            //validacion 
            $errores = $articulo->validar();

           //Generar nombre de imagen unico 
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";

            // Declarar variable fuera del if
            $imagen = null;

            if($_FILES['articulo']['tmp_name']['imagen']){
                $manager = new Image(Driver::class); //Configuracion Driver
                $imagen = $manager->read($_FILES['articulo']['tmp_name']['imagen'])->cover(800, 600); //Se leer la imagen y se le realiza una transformacion
                $articulo->setImagen($nombreImagen);
            }
            
            //En caso de que no haya errores guardar 
            if(empty($errores)){
                //Almacenar la imagen solo si se subió una nueva
                if($imagen){
                    $imagen->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $articulo->guardar();
            }


        }

        $router->render('/articulos/actualizar', [
            'articulo' => $articulo,
            'errores' => $errores
    
        ]);

    }

    public static function eliminar(){
        //El post no va a existir hasta que se me mande el request medhod 
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
                //Validar id     
                 $id = $_POST['id'];
                 $id = filter_var($id, FILTER_VALIDATE_INT);
                
                 if($id){
                     $tipo = $_POST['tipo'];
                    if(validarTipoContenido($tipo)){
                        $articulo = Articulo::find($id);
                        $articulo->eliminar();
                        header('Location: /admin?resultado=3');
                   }    
                 }
           }
        }
}