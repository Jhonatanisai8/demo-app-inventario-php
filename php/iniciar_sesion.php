<?php
#reseccion de datos
$login_usuario = limpiar_cadena($_POST['login_usuario']);
$login_password = limpiar_cadena($_POST['login_clave']);

#verificamos los campos obligatorios
if ($login_usuario == "" || $login_password == "") {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
        </div>
    ';
    exit();
}

#verificamos integridad de los datos
if (verificar_datos("[a-zA-Z0-9]{4,20}", $login_usuario)) {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El USUARIO no coincide con el formato solicitado
        </div>
    ';
    exit();
}
if (verificar_datos("[a-ZA-Z0-9$@.-]{7,100}", $login_password)) {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            La CONTRASEÑA no coincide con el formato solicitado
        </div>
    ';
    exit();
}

/*
usuario_id
usuario_nombre
usuario_apellidos
usuario_usuario
usuario_clave
usuario_email

*/
#verificacion de datos 
$chekear_usuario = conexion();
$chekear_usuario = $chekear_usuario->query("SELECT * FROM usuario WHERE usuario_usuario='$login_usuario'");
if ($chekear_usuario->rowCount() == 1) {
    $chekear_usuario = $chekear_usuario->fetch();
    if (
        $chekear_usuario['usuario_usuario'] == $login_usuario &&
        password_verify($login_password, $chekear_usuario['usuario_clave'])
    ) {
        $_SESSION['id'] = $chekear_usuario['usuario_id'];
        $_SESSION['nombre'] = $chekear_usuario['usuario_nombre'];
        $_SESSION['apellido'] = $chekear_usuario['usuario_apellidos'];
        $_SESSION['usuario'] = $chekear_usuario['usuario_usuario'];

        if (headers_sent()) {
            echo "<script> window.location.href='index.php?vista=home'; </script>";
        } else {
            header("Location: index.php?vista=home");
        }
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
               El USUARIO o CONTRASEÑA son incorrectos
            </div>
        ';
    }
} else {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
           El USUARIO o CONTRASEÑA son incorrectos
        </div>
    ';
}

$chekear_usuario = null;
