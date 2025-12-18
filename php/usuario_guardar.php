<?php
require_once "main.php";

// almacenos los datos 
$nombre = limpiar_cadena($_POST["usuario_nombre"]);
$apellido = limpiar_cadena($_POST["usuario_apellidos"]);
$nombre_usuario = limpiar_cadena($_POST["usuario_usuario"]);
$email = limpiar_cadena($_POST["usuario_email"]);
$clave1 = limpiar_cadena($_POST["usuario_clave"]);
$clave2 = limpiar_cadena($_POST["usuario_clave2"]);

//verificamos los campos obligatorios 
if (
    $nombre == "" || $apellido == "" ||
    $nombre_usuario == "" || $clave1 == "" || $clave2 == ""
) {

    echo '  <div class="notification is-danger is-light">
                <strong>Ocurrio un erro inesperado!</strong>
                <br>
                No has llenado todos los campos que son obligatorios
            </div>';
    exit();
}
