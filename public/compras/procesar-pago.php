<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombreTarjeta = $_POST["nombre-tarjeta"];
  $numeroTarjeta = $_POST["numero-tarjeta"];
  $fechaExpiracion = $_POST["fecha-expiracion"];
  $cvv = $_POST["cvv"];
  
  $errores = [];
  
  if (empty($nombreTarjeta)) {
    $errores[] = "El nombre en la tarjeta es obligatorio";
  }
  
  if (empty($numeroTarjeta)) {
    $errores[] = "El número de tarjeta es obligatorio";
  } else if (!preg_match("/^\d{16}$/", $numeroTarjeta)) {
    $errores[] = "El número de tarjeta no es válido";
  }
  
  if (empty($fechaExpiracion)) {
    $errores[] = "La fecha de expiración es obligatoria";
  }
  
  if (empty($cvv)) {
    $errores[] = "El CVV es obligatorio";
  } else if (!preg_match("/^\d{3}$/", $cvv)) {
    $errores[] = "El CVV no es válido";
  }
  
  if (count($errores) == 0) {
    // Procesar el pago
    echo "Pago procesado exitosamente";
  } else {
    // Mostrar los errores al usuario
    foreach ($errores as $error) {
      echo "<p>$error</p>";
    }
  }
}
?>
    <a class="btn-btn-primary" href="index.php">Volver</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
</body>
</html>