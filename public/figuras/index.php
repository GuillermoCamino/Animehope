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
        <h1>Listado de Figuras</h1>
        <a href="../../util/desconectarse.php">Cerrar Sesion</a>
        <div class="row">
            <div class="col-9">
                <a class="btn btn-primary" href="insertar_figura.php">Nueva Figura</a>
                <table class=" table table-striped table-hover">
                    <thead class="table table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                            <th>Tamaño</th>
                            <th>Precio</th>
                            <th>Marca</th>
                            <th>año</th>

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php // borrar figura
                            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                $id=$_POST["id"];
                                $sql = "SELECT imagen FROM figuras WHERE id='$id'";
                                $resultado=$conexion -> query($sql);
                                if ($resultado -> num_rows >0){
                                    while ($fila = $resultado -> fetch_assoc()){
                                        $imagen = $fila["imagen"];
                                    }
                                    unlink("../" . $imagen);
                                }

                                $sql = " DELETE FROM figuras WHERE id = '$id'";
                                
                                if($conexion -> query($sql)){
                                    ?> 
                                    <div class="alert alert-info alert-dismissible fade show" role="alert"><?php  
                                    echo "<p>Registro borrado</p>";?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
                                    <?php
                                }else{
                                    echo "<p>No se ha podido borrar</p>";
                                }
                            }
                        ?>
                        <?php //seleccionar figuras
                            $sql="SELECT * FROM figuras";
                            $resultado=$conexion -> query($sql);

                            if($resultado -> num_rows > 0){
                                while ($fila = $resultado -> fetch_assoc()){
                                    $nombre=$fila["nombre"];
                                    $tamanio=$fila["tamanio"];
                                    $precio=$fila["precio"];
                                    $anio=$fila["anio"];
                                    $marca=$fila["marca"];
                                    $imagen=$fila["imagen"];
                                    ?>
                                        <tr>
                                            <td><?php echo $nombre?></td>
                                            <td>
                                                <img width="50" height="70" src="../<?php echo $imagen?>">
                                            </td>
                                            <td><?php echo $tamanio?></td>
                                            <td><?php echo $precio?></td>
                                            <td><?php echo $marca?></td>
                                            <td><?php echo $anio?></td>
                                            <td>
                                                <form action="mostrar_figura.php" method="get">
                                                    <button class="btn btn-success" type="submit">Ver</button>
                                                    <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                                </form>
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    <button class="btn btn-danger" type="submit">Borrar</button>
                                                    <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-3">
                <img width="300" height="300" src="../../resources/images/AnimehopeLogo.png">
            </div>
        </div>
    </div>
    <?php require '../footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>
</html>