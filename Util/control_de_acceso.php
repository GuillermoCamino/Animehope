<?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("location: http://localhost/Animehope/Animehope/public/clientes/iniciar_sesion.php");
    }
