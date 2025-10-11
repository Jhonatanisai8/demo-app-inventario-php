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

function limpiar_cadena($cadena)
{
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    $cadena = str_ireplace("<script>", "", $cadena);
    $cadena = str_ireplace("</script>", "", $cadena);
    $cadena = str_ireplace("<script src>", "", $cadena);
    $cadena = str_ireplace("<script type=>", "", $cadena);
    $cadena = str_ireplace("alert", "", $cadena);
    $cadena = str_ireplace("SELECT * FROM", "", $cadena);
    $cadena = str_ireplace("DELETE * FROM", "", $cadena);
    $cadena = str_ireplace("INSERT INTO", "", $cadena);
    $cadena = str_ireplace("DROP TABLE", "", $cadena);
    $cadena = str_ireplace("DROP DATABASE", "", $cadena);
    $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
    $cadena = str_ireplace("SHOW TABLES", "", $cadena);
    $cadena = str_ireplace("SHOW DATABASES", "", $cadena);
    $cadena = str_ireplace("<?php", "", $cadena);
    $cadena = str_ireplace("?>", "", $cadena);
    $cadena = str_ireplace("--", "", $cadena);
    $cadena = str_ireplace("^", "", $cadena);
    $cadena = str_ireplace("<", "", $cadena);
    $cadena = str_ireplace("[", "", $cadena);
    $cadena = str_ireplace("]", "", $cadena);
    $cadena = str_ireplace("==", "", $cadena);
    $cadena = str_ireplace(";", "", $cadena);
    $cadena = str_ireplace("::", "", $cadena);
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    return $cadena;
}

$texto = "  Hola <script>alert('Hola');</script>  ";
echo limpiar_cadena($texto);