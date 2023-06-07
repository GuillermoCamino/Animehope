<?php
    $servidor= 'localhost';
    $usuario='admin';
    $contrasena = 'Adminbd26';
    $base_de_datos='db_tienda_anime';


    $conexion= new MySQLi($servidor,$usuario,$contrasena,$base_de_datos) or die("Erros en al conexion");

?>