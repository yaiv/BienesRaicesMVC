<?php 

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;



class PropiedadController {
    public static function index(Router $router){
        
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null; //Se revisa que hay un get si no se muestra nada 

        
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades, 
            'resultado' => $resultado,
            'vendedores' => $vendedores
            
        ]);
    }

    public static function crear(Router $router){
        $propiedad = new Propiedad; 
        $vendedores = Vendedor::all();
            //Arreglo con mensajes de errores 
        $errores = Propiedad::getErrores();

   if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //Crea una nueva instancia con los datos enviados 
    $propiedad = new Propiedad($_POST['propiedad']);


    //Generar nombre de imagen unico 
    $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";

    //Procesar imagen solo si se subio
    //Satear la imagen
    //Realizar un resize a la imagen con intervention
    if($_FILES['propiedad']['tmp_name']['imagen']){ //Se revisa si existe la imagen 
        //  Asignar nombre del objeto
        $propiedad->setImagen($nombreImagen);
        //crear imagen usando intervention
        $manager = new Image(Driver::class); //Configuracion Driver
        $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600); //Se leer la imagen y se le realiza una transformacion
        
    }


        //Validar campos
     $errores = $propiedad->validar();
     //debuguear($propiedad);

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
        $propiedad->guardar();

        }

    }


        
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores

        ]);

    }

    public static function actualizar(Router $router){
        
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();


        $errores = Propiedad::getErrores();


        if($_SERVER['REQUEST_METHOD'] === 'POST'){

   // debuguear($_POST);

   //Asignar los atributos 
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);

    //Validacion
    $errores = $propiedad->validar();

    //Subida de archivos 

    //Generar nombre de imagen unico 
    $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";

     // Declarar variable fuera del if
    $imagen = null;

    if($_FILES['propiedad']['tmp_name']['imagen']){
    $manager = new Image(Driver::class); //Configuracion Driver
    $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600); //Se leer la imagen y se le realiza una transformacion
    $propiedad->setImagen($nombreImagen);
        }
    //En caso de que no haya errores guardar 
    if(empty($errores)){
        //Almacenar la imagen 
        if($imagen){
        $imagen->save(CARPETA_IMAGENES . $nombreImagen);
        }
        $propiedad->guardar();
    }
}


        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores,
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
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
               }    
             }
       }
    
    }

}