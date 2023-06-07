<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
    <style>
        #buscar{
            margin:10px;
        }
        body{
            padding-left:30px;
            padding-right:30px;
        }
    </style>
</head>

<body>
    <?php require '../util/control_de_acceso.php' ?>
    <?php require './header.php' ?>
    <?php require '../util/base_de_datos.php' ?>
    <form action="buscador.php" method="GET">
            <input type="text" name="buscar" id="buscar">
            <button type="submit">Buscar</button>
    </form>
    <?php
$buscar = $_GET['buscar'];
$conexion = mysqli_connect('localhost', 'admin', 'Adminbd26', 'db_tienda_anime');

$sql = "SELECT * FROM figuras WHERE nombre LIKE '%$buscar%'";
$resultado = mysqli_query($conexion, $sql);

echo "<table class='table table-striped table-hover'>";
echo "<thead class='table-dark'>";
echo "<tr><th>nombre</th><th>tamaño</th><th>precio</th><th>marca</th><th>imagen</th></tr>";
if(mysqli_num_rows($resultado)>0){
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $nombre=$fila["nombre"];
        $tamanio=$fila["tamanio"];
        $precio=$fila["precio"];
        $marca=$fila["marca"];
        $imagen=$fila["imagen"];
        ?>
        <tr>
            <td><?php echo $nombre?></td>
            <td><?php echo $tamanio?></td>
            <td><?php echo $precio?></td>
            <td><?php echo $marca?></td>
            <td>
                <img width="50" height="70" src="./..<?php echo $imagen?>">
            </td>
        </tr> 
        <?php
    }
}else{
    echo "No se encontraron resultados";
}

mysqli_close($conexion);
?>
</table>
<?php require './footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

</body>
</html>