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
    <?php require '../../../util/control_de_acceso.php' ?>
    <?php require '../../header.php' ?>
    <?php require '../../../util/base_de_datos.php' ?>
        <h1>Listado de Figuras</h1>
        <a href="../../../util/desconectarse.php">Cerrar Sesion</a>
        <div class="row">
            <div class="col-9">
                <a class="btn btn-primary" href="insertar_prenda.php">Nueva Figura</a>
                <table class=" table table-striped table-hover">
                    <thead class="table table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                            <th>Tamanio</th>
                            <th>Precio</th>
                            <th>Marca</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //seleccionar figuras
                            $sql="SELECT * FROM figuras WHERE marca='banpresto'";
                            $resultado=$conexion -> query($sql);

                            if($resultado -> num_rows > 0){
                                while ($fila = $resultado -> fetch_assoc()){
                                    $nombre=$fila["nombre"];
                                    $tamanio=$fila["tamanio"];
                                    $precio=$fila["precio"];
                                    $marca=$fila["marca"];
                                    $imagen=$fila["imagen"];
                                    ?>
                                        <tr>
                                            <td><?php echo $nombre?></td>
                                            <td>
                                                <img width="50" height="70" src="../../..<?php echo $imagen?>">
                                            </td>
                                            <td><?php echo $tamanio?></td>
                                            <td><?php echo $precio?></td>
                                            <td><?php echo $marca?></td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <?php require '../../footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>
</html>