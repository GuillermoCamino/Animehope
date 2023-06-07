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

    <?php require '../../util/control_de_acceso.php' ?>
    <?php require '../header.php' ?>
    <?php require '../../util/base_de_datos.php' ?>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $figura_id = $_POST["figura"];
            $cantidad = $_POST["cantidad"];
            //$cliente_id = 10;
            $fecha = date('Y-m-d H:i:s');   //  2022-11-15 09:25

            //  Buscar el id del cliente que ha iniciado sesión
            $usuario = $_SESSION["usuario"];

            $sql = "SELECT * FROM clientes WHERE usuario = '$usuario'";

            $resultado = $conexion -> query($sql);
            if($resultado -> num_rows>0 ){
                while($fila = $resultado -> fetch_assoc()){
                    $cliente_id=$fila["id"];
                }
            }

            echo "<p>ID Figura: $figura_id</p>";
            echo "<p>Cantidad: $cantidad</p>";

                $sql= "INSERT INTO clientes_figuras (cliente_id,figuras_id,cantidad,fecha) VALUES ('$cliente_id','$figura_id','$cantidad','$fecha')";
               
                if($conexion -> query($sql)=="TRUE"){
                    echo "<p>Figura Comprada</p>";
                }else{
                    echo "<p>Error al insertar</p>";
                }
            
        }
    ?>

<div class="container">
    <h1>Comprar figura</h1>
    <a href="../../util/desconectarse.php">Cerrar Sesion</a>
    <div class="row">
        <div class="col-9">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>año</th>
                        <th>Cantidad</th>
                        <th>Marca</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM figuras";
                        $resultado = $conexion -> query($sql);

                        if ($resultado -> num_rows > 0) {
                            while ($fila = $resultado -> fetch_assoc()) {
                            ?>
                    <form action="" method="post">
                        <tr>
                            <td><?php echo $fila["nombre"] ?></td>
                            <td>
                                <img width="50" height="60" src="../<?php echo $fila["imagen"] ?>">
                            </td>
                            <td><?php echo $fila["precio"] ?></td>
                            <td><?php echo $fila["anio"] ?></td>
                            <td>
                                <select class="form-select" name="cantidad">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                            <td>
                                <input type="hidden" name="figura" value="<?php echo $fila["id"] ?>">
                                <button class="btn btn-success" type="submit">
                                    Comprar
                                </button>
                            </td>
                        </tr>
                    </form>
                    <?php
                            } 
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
</body>

</html>