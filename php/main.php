<?php
$pdo = new PDO('mysql:host=localhost;dbname=db_inventario_php', 'root', '753159852');
$pdo->query("insert into categoria(categoria_nombre,categeria_ubicacion)
values ('Prueba','Texto Ubicacion')");
