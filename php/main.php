<?php
/*$pdo = new PDO('mysql:host=localhost;dbname=db_inventario_php', 'root', '753159852');
$pdo->query("insert into categoria(categoria_nombre,categeria_ubicacion)
values ('Prueba','Texto Ubicacion')");
*/


//conexion con la base de datos
function conexion()
{
    $pdo = new PDO("mysql:host=localhost;dbname=db_inventario_php", "root", "");
    return $pdo;
}

function verificar_datos($filtro, $cadena)
{
    //si la cadena coincide con el filtro retorna falso
    if (preg_match("/^" . $filtro . "$/", $cadena)) {
        return false;
    } else {
        return true;
    }
}
/*
$nombre = "Juan6";
if (verificar_datos("[a-zA-Z]{6,10}", $nombre)) {
    echo "Los datos no coinciden con el formato solicitado";
}
 */