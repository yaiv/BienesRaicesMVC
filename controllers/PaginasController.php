<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Articulo;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PaginasController {
    public static function index ( Router $router ){

        $propiedades = Propiedad::get(3);
        $articulos = Articulo::get(2);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'articulos' => $articulos,
            'inicio' => $inicio

        ]);
    }

        public static function nosotros ( Router $router ){

        $router->render('paginas/nosotros');
    }

        public static function propiedades ( Router $router ){

            $propiedades = Propiedad::all();

        $router->render('paginas/propiedades',[
            'propiedades' => $propiedades

        ]);
    }

        public static function propiedad ( Router $router ){
        
        $id = validarORedireccionar('/propiedades');

        //Buscar la propiedad por su id 
        $propiedad = Propiedad::find($id);
            $router->render('paginas/propiedad',[
                'propiedad' => $propiedad

        ]);
    }

        public static function blog ( Router $router ){
            $articulos = Articulo::all();
            $router->render('paginas/blog', [
                'articulos' => $articulos
            ]);
    }

        public static function entrada ( Router $router ){
            $id = validarORedireccionar('/blog');
            
            //Buscar el artículo por su id
            $articulo = Articulo::find($id);
            
            $router->render('paginas/entrada', [
                'articulo' => $articulo
            ]);
    }


      public static function contacto(Router $router) {
    
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Validar que todos los campos estén presentes
            $errores = [];
            
            if(empty($_POST['contacto']['nombre'])) {
                $errores[] = 'El nombre es obligatorio';
            }
            if(empty($_POST['contacto']['mensaje'])) {
                $errores[] = 'El mensaje es obligatorio';
            }
            if(empty($_POST['contacto']['tipo'])) {
                $errores[] = 'Debe seleccionar si vende o compra';
            }
            if(empty($_POST['contacto']['precio'])) {
                $errores[] = 'El precio es obligatorio';
            }
            if(empty($_POST['contacto']['contacto'])) {
                $errores[] = 'Debe seleccionar cómo desea ser contactado';
            }

            // Validación condicional según el tipo de contacto
            if(isset($_POST['contacto']['contacto'])) {
                if($_POST['contacto']['contacto'] === 'email') {
                    if(empty($_POST['contacto']['email'])) {
                        $errores[] = 'El email es obligatorio cuando selecciona contacto por email';
                    }
                } else {
                    if(empty($_POST['contacto']['telefono'])) {
                        $errores[] = 'El teléfono es obligatorio cuando selecciona contacto por teléfono';
                    }
                    if(empty($_POST['contacto']['fecha'])) {
                        $errores[] = 'La fecha es obligatoria cuando selecciona contacto por teléfono';
                    }
                    if(empty($_POST['contacto']['hora'])) {
                        $errores[] = 'La hora es obligatoria cuando selecciona contacto por teléfono';
                    }
                }
            }

            if(empty($errores)) {
                //Crear instancia en PHPMailer
                $mail = new PHPMailer();

                try {
                    //Configurar SMTP
                    $mail->isSMTP();
                    $mail->Host = 'sandbox.smtp.mailtrap.io';
                    $mail->SMTPAuth = true;
                    $mail->Port = 2525;
                    $mail->Username = 'a196fd959a9297';
                    $mail->Password = '8ce0081a3dbda7';
                    $mail->SMTPSecure = 'tls';
                    
                    //Configurar contenido del email
                    $mail->setFrom('admin@bienesraices.com', 'Bienes Raíces');
                    $mail->addAddress('admin@bienesraices.com', 'Bienes Raíces');
                    $mail->Subject = 'Tienes un nuevo mensaje de contacto';

                    //Habilitar html
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';


                    //Definir el contenido
                    $contenido = '<html>';
                    $contenido .= '<p>Tienes un nuevo mensaje</p>';
                    $contenido .= '<p><strong>Nombre:</strong> ' . $_POST['contacto']['nombre'] . '</p>';
                    
                    //Enviar de forma condicional algunos campos de email o telefono
                    if($_POST['contacto']['contacto'] === 'email') {
                        $contenido .= '<p><strong>Email:</strong> ' . $_POST['contacto']['email'] . '</p>';
                    } else {
                        $contenido .= '<p><strong>Teléfono:</strong> ' . $_POST['contacto']['telefono'] . '</p>';
                        $contenido .= '<p><strong>Fecha:</strong> ' . $_POST['contacto']['fecha'] . '</p>';
                        $contenido .= '<p><strong>Hora:</strong> ' . $_POST['contacto']['hora'] . '</p>';
                    }
                    
                    $contenido .= '<p><strong>Mensaje:</strong> ' . $_POST['contacto']['mensaje'] . '</p>';
                    $contenido .= '<p><strong>Tipo:</strong> ' . $_POST['contacto']['tipo'] . '</p>';
                    $contenido .= '<p><strong>Precio:</strong> $' . $_POST['contacto']['precio'] . '</p>';
                    $contenido .= '<p><strong>Contacto preferido:</strong> ' . $_POST['contacto']['contacto'] . '</p>';
                    
                    $contenido .= '</html>';
                    
                    $mail->Body = $contenido;
                    $mail->AltBody = 'Esto es texto alternativo sin HTML.';
                    
                    //Enviar el email
                    if($mail->send()){
                        $mensaje = "Mensaje enviado correctamente";
                        $tipo = 'exito';
                    } else {
                        $mensaje = "El mensaje no se pudo enviar";
                        $tipo = 'error';
                    }
                } catch (Exception $e) {
                    $mensaje = "Error al enviar el mensaje";
                    $tipo = 'error';
                }
            } else {
                $tipo = 'error';
            }
        }

        $router->render('paginas/contacto', [
            'errores' => $errores ?? [],
            'mensaje' => $mensaje ?? null,
            'tipo' => $tipo ?? null
        ]);
    }

}