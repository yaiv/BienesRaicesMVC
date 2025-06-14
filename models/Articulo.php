<?php 

namespace Model;

use Intervention\Image\Colors\Hsv\Channels\Value;

//Se va a tulizar active record, es el responsable de trabajar con datos

class Articulo extends ActiveRecord {

        protected static $tabla = 'articulos';
            //Arrelo que permite mapear en crear.php
    protected static $columnasDB = ['id', 'titulo', 'autor', 'fecha', 'contenido', 'imagen', 'creada_en'];

    public $id;
    public $titulo;
    public $autor;
    public $fecha;
    public $contenido;
    public $imagen;
    public $creada_en;

        public function __construct($args = [])
    {

        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->autor = $args['autor'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->contenido = $args['contenido'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->creada_en = date('y/m/d');
        }

     public function validar(){
            //Mensajes de error 
    if(!$this->titulo) {
        self::$errores[] = "El titulo es obligatorio";
    }

    if(!$this->autor) {
        self::$errores[] = "El autor es obligatorio";
    }

    if(!$this->fecha) {
        self::$errores[] = "La fecha de publicacion es obligatoria";
    }

    //validacion imagen obligatoria
    if(!$this->imagen){
        self::$errores[] = 'La imagen es obligatoria';
    }

    if( strlen ($this->contenido) < 200) {
        self::$errores[] = "El contenido del articulo debe ser de al menos 200 carcteres";
    }



    return self::$errores;
    }

}


