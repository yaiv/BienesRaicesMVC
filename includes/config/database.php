<?php

//conexion con BD
function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices');

    if(!$db){
        echo "Error no se pudo conectar";
    exit;
    }
    return $db;
}
