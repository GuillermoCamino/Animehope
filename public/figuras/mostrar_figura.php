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
    <div class="container">
    <?php require '../../util/control_de_acceso.php' ?>
    <?php require '../header.php' ?>
    <?php require '../../util/base_de_datos.php' ?>

            <h1>Ver Figuras</h1>
            <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET["id"];
            echo "<p>$id</p>";

            $sql = "SELECT * FROM figuras WHERE id = '$id'";

            $resultado = $conexion -> query($sql);

            if ($resultado -> num_rows > 0) {
                while ($fila = $resultado -> fetch_assoc()) {
                    $nombre = $fila["nombre"];
                    $tamanio = $fila["tamanio"];
                    $precio = $fila["precio"];
                    $anio = $fila["anio"];
                    $marca = $fila["marca"];
                    $imagen = $fila["imagen"];
                }
            }
        }
        ?>
        <div class="row">
            <div class="col-6">
                <p>nombre: <?php echo $nombre?></p>
                <p>tamanio: <?php echo $tamanio?></p>
                <p>precio: <?php echo $precio?></p>
                <p>año: <?php echo $anio?></p>
                <p>marca: <?php echo $marca?></p>
                <a class="btn btn-secondary" href="index.php">Volver</a>
                <br><br>
                <form action="editar_figura.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $id ?>" >
                    <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                    <input type="hidden" name="tamanio" value="<?php echo $tamanio ?>">
                    <input type="hidden" name="precio" value="<?php echo $precio ?>">
                    <input type="hidden" name="anio" value="<?php echo $anio ?>">
                    <input type="hidden" name="marca" value="<?php echo $marca ?>">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
            <div class="col-4">
            <img width="200" height="300" src="../<?php echo $imagen ?>">
            </div>
        </div>
    </div>
      

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
</body>

</html>