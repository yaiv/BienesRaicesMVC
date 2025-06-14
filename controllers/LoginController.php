<?php 

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {

    public static function login( Router $router ){

        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)){

                //Verifica si existe el usuario 
              $resultado = $auth->existeUsuario();

            if(!$resultado){
                $errores = Admin::getErrores();
            }else {
            //Se verifica password

          $autenticado =  $auth->comprobarPassword($resultado);

          if($autenticado){
            //Autentica al usuario

            $auth->autenticar();

          }else{
            //Password incorrecto mensaje de error 
            $errores = Admin::getErrores();
          }

            
            }
                

                
            }
        }

        $router->render('auth/login',[
            'errores' => $errores

        ]);

    }

    public static function crear_usuario( Router $router ){
        $mensaje = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recupera y sanitiza los datos del formulario
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            
            // Validaciones
            if(!$email) {
                $mensaje[] = "El correo es obligatorio";
            }
            
            if(!$password) {
                $mensaje[] = "La contraseña es obligatoria";
            }
            
            if(empty($mensaje)) {
                // Obtener la conexión de la base de datos
                $db = conectarDB();
                
                // Verificar si el correo ya existe en la base de datos
                $queryVerificar = "SELECT * FROM usuarios WHERE email = '{$email}'";
                $resultadoVerificar = mysqli_query($db, $queryVerificar);
                
                if(mysqli_num_rows($resultadoVerificar) > 0) {
                    $mensaje[] = "El email ya está registrado";
                } else {
                    // Hashear la contraseña
                    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                    
                    // Query para crear el usuario 
                    $query = "INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}')";
                    
                    // Insertarlo a la BD 
                    $resultado = mysqli_query($db, $query);
                    
                    if($resultado) {
                        $mensaje[] = "Usuario creado correctamente";
                    } else {
                        $mensaje[] = "Error al crear el usuario: " . mysqli_error($db);
                    }
                }
            }
        }

        $router->render('auth/crear-usuario', [
            'mensaje' => $mensaje
        ]);
    }

    
    public static function logout(){
        session_start();

        $_SESSION = [];

        header('Location: /');
    }

}