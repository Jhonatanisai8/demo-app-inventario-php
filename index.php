<?php
require 'inc/session_start.php';
?>
<!doctype html>
<html lang="es">

<head>
    <?php
    include 'inc/head.php';
    ?>
</head>

<body>
    <?php

    if (!isset($_GET['vista']) || $_GET['vista'] == "") {
        $_GET['vista'] = "login";
    }
    if (
        is_file("./views/" . $_GET['vista'] . ".php")
        && $_GET['vista'] != "login" && $_GET['vista'] != "404"
    ) {
        //cerrar sesion forzada
        if ((!isset($_SESSION['id']) || $_SESSION['id'] == "") ||
            (!isset($_SESSION['usuario']) || $_SESSION['usuario'] == "")
        ) {
            require './views/logout.php';
            exit();
        }
        include './inc/navbar.php';
        include "./views/" . $_GET['vista'] . ".php";
        include './inc/script.php';
    } else {
        if ($_GET['vista'] == "login") {
            include './views/login.php';
        } else {
            include './views/404.php';
        }
    }
    ?>
</body>

</html>