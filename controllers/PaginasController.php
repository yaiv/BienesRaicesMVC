<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Articulo;


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

        public static function contacto ( ){
        echo 'desde contacto xd';
    }
}