
<?php
    session_start();
    session_destroy();
    header("location: http://localhost/Animehope/public/clientes/iniciar_sesion.php");
?>