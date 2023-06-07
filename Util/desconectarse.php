<?php
    session_start();
    session_destroy();
    header("location: http://localhost/Animehope/Animehope/public/clientes/iniciar_sesion.php");
?>