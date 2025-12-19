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
if (verificar_datos("[a-zA-Z0-9$@.\-]{7,100}", $clave1) || verificar_datos("[a-zA-Z0-9$@.\-]{7,100}", $clave2)) {
    echo '  <div class="notification is-danger is-light">
                <strong>Ocurrio un erro inesperado!</strong>
                <br>
                La Claves no coincide con el formato solicitado.
            </div>';
    exit();
}
#verificando el email
if ($email != "") {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_chekeado = conexion();
        $email_chekeado = $email_chekeado->query("SELECT usuario_email from usuario where usuario_email='$email'");
        if ($email_chekeado->rowCount() > 0) {
            echo '  <div class="notification is-danger is-light">
                        <strong>Ocurrio un erro inesperado!</strong>
                        <br>
                        El Email ingresado ya se encuentra registrado, por favor elija otro.
                    </div>';
            exit();
        }
        $email_chekeado = null;
    } else {
        echo '  <div class="notification is-danger is-light">
                    <strong>Ocurrio un erro inesperado!</strong>
                    <br>
                    El Email no coincide con el formato solicitado.
                </div>';
        exit();
    }
}

#verificacion de nombre de usuario
$usuario_chekeado = conexion();
$usuario_chekeado = $usuario_chekeado->query("SELECT usuario_usuario from usuario where usuario_usuario='$nombre_usuario'");
if ($usuario_chekeado->rowCount() > 0) {
    echo '  <div class="notification is-danger is-light">
                        <strong>Ocurrio un erro inesperado!</strong>
                        <br>
                        El Nombre de usuario ya se encuentra registrado, por favor elija otro.
                    </div>';
    exit();
}
$usuario_chekeado = null;

#verfiifcaion de claves
if ($clave1 != $clave2) {
    echo '  <div class="notification is-danger is-light">
                <strong>Ocurrio un erro inesperado!</strong>
                <br>
                Las claves ingresadas no coinciden.
            </div>';
    exit();
} else {
    $clave = password_hash($clave1, PASSWORD_BCRYPT, ["cost" => 10]);
}

#guardando datos
$guardar_usuario = conexion();
$guardar_usuario = $guardar_usuario->query("INSERT INTO usuario(usuario_nombre,usuario_apellidos,usuario_usuario,usuario_clave,usuario_email)
 VALUES('$nombre','$apellido','$nombre_usuario','$clave','$email')");
