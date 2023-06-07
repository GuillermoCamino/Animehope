<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>editar figura</title>
    <style>
    .alerta {
        margin-left:30%;
        margin-bottom: 430px;
        width: 100%;
    }

    .container {
        padding: 20px;
        background: #f0f0f0;
        width: 400px; 
        display:flex;
        justify-content:center;
    }

    .form-container {
        margin-top:50px;
        background-color: white;
        padding: 5%;
        border-radius: 20px;
    }
    #titulo{
        justify-content:center;
    }
    h1{
        display:flex;
        justify-content:center;
        align-items:center;
    }
    </style>
</head>

<body>
    <?php require '../../util/control_de_acceso.php' ?>
    <?php require '../header.php' ?>
    <?php require '../../util/base_de_datos.php' ?>
    <?php

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
        $nombre=$_GET["nombre"];
        $precio=$_GET["precio"];
        $anio=$_GET["anio"];
        $tamanio=$_GET["tamanio"];
        $marca=$_GET["marca"];
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $precio=$_POST["precio"];
        $anio=$_POST["anio"];
        $tamanio=$_POST["tamanio"];
        $marca=$_POST["marca"];

        $sql="UPDATE figuras SET nombre='$nombre',tamanio='$tamanio',precio='$precio',marca='$marca',anio='$anio' WHERE id='$id'";
        if ($conexion -> query($sql)=="TRUE"){
            ?> 
            <div class="alert alert-info alert-dismissible fade show" role="alert"><?php  
            echo "<p>Figura modificada</p>";?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php
        }else{
            ?>
            <div class="alert alert-danger" role="alert"><?php echo "<p>Error al modificar</p>"; ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php
        } 
    }
    ?>
        <h1>Editar figura</h1>
        <div class="container">
            <div class="col-6">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre" value="<?php echo $nombre ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">marca</label>
                        <select class="form-select" name="marca" value="<?php echo $marca ?>">
                            <option value="<?php echo $marca ?>" select  hidden> <?php echo ucfirst(strtolower($marca)) ?> </option>
                            <option value="Banpresto">Banpresto</option>
                            <option value="GoodSmileCompany">GoodSmileCompany</option>
                            <option value="Furyu">Furyu</option>
                            <option value="Nendoroid">Nendoroid</option>
                            <option value="SquareEnix">SquareEnix</option>
                            <option value="NoodleCupHolder">NoodleCupHolder</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Precio</label>
                        <input class="form-control" type="text" name="precio" value="<?php echo $precio ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">año</label>
                        <input class="form-control" type="text" name="anio" value="<?php echo $anio ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Tamaño</label>
                        <input class="form-control" type="text" name="tamanio" value="<?php echo $tamanio ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button class="btn btn-primary" type="submit">Editar</button>
                    <a class="btn-btn-secundary" href="index.php">Volver</a>
                </form>
            </div>
        </div>
        <?php require '../footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</body>

</html>