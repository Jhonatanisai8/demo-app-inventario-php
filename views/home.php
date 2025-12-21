<?php
$nombre =  $_SESSION['nombre'];
$apellido =   $_SESSION['apellido'];
?>
<div class="container">
    <h1 class="title">Home</h1>
    <h3 class="subtitle">Bienvenido <?php echo $nombre . " " . $apellido; ?></h3>
</div>