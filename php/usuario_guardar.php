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


#verificamos la integridad de los datos
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $nombre)) {
    echo '  <div class="notification is-danger is-light">
                <strong>Ocurrio un erro inesperado!</strong>
                <br>
                El Nombre no coincide con el formato solicitado.
            </div>';
    exit();
}
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $apellido)) {
    echo '  <div class="notification is-danger is-light">
                <strong>Ocurrio un erro inesperado!</strong>
                <br>
                El Apellido no coincide con el formato solicitado.
            </div>';
    exit();
}
if (verificar_datos("[a-zA-Z0-9]{4,20}", $nombre_usuario)) {
    echo '  <div class="notification is-danger is-light">
                <strong>Ocurrio un erro inesperado!</strong>
                <br>
                El nombre de usuario no coincide con el formato solicitado.
            </div>';
    exit();
}
if (verificar_datos("[a-zA-Z0-9$@.-] {7,100}", $clave1) || verificar_datos("[a-zA-Z0-9$@.-] {7,100}", $clave2)) {
    echo '  <div class="notification is-danger is-light">
                <strong>Ocurrio un erro inesperado!</strong>
                <br>
                La Claves no coincide con el formato solicitado.
            </div>';
    exit();
}
