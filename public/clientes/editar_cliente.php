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
        require '../header.php' ;
        require '../../util/base_de_datos.php' ;

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
        $usuario=$_GET["usuario"];
        $nombre=$_GET["nombre"];
        $apellido_1=$_GET["apellido_1"];
        $apellido_2=$_GET["apellido_2"];
        $fecha_nacimiento=$_GET["fecha_nacimiento"];
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id=$_POST["id"];
        $usuario=$_POST["usuario"];
        $nombre=$_POST["nombre"];
        $apellido_1=$_POST["apellido_1"];
        $apellido_2=$_POST["apellido_2"];
        $fecha_nacimiento=$_POST["fecha_nacimiento"];

        $sql="UPDATE clientes SET usuario='$usuario',nombre='$nombre', apellido_1='$apellido_1',apellido_2='$apellido_2',fecha_nacimiento='$fecha_nacimiento' WHERE id='$id'";
        if ($conexion -> query($sql)=="TRUE"){
            ?> 
            <div class="alert alert-info alert-dismissible fade show" role="alert"><?php  
            echo "<p>cliente modificada</p>";?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php
        }else{
            ?>
            <div class="alert alert-danger" role="alert"><?php echo "<p>Error al modificar</p>"; ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php
        } 
    }
    ?>
    <div class="container">
    
        <h1>Nuevo Cliente</h1>

        <div class="row">
            <div class="col-3">
                <form action="" method="post">
                    <div class="form-group mb-3">
                    <label class="form-label">Usuario</label>
                    <input class="form-control" type="text" name="usuario" value="<?php echo $usuario ?>">
                    </div>
                    <div class="form-group mb-3">
                    <label class="form-label">nombre</label>
                    <input class="form-control" type="text" name="nombre" value="<?php echo $nombre ?>">
                    </div>
                    <div class="form-group mb-3">
                    <label class="form-label">apellido_1</label>
                    <input class="form-control" type="text" name="apellido_1" value="<?php echo $apellido_1 ?>">
                    </div>
                    <div class="form-group mb-3">
                    <label class="form-label">apellido_2</label>
                    <input class="form-control" type="text" name="apellido_2" value="<?php echo $apellido_2 ?>">
                    </div>
                    <div class="form-group mb-3">
                    <label class="form-label">fecha_nacimiento</label>
                    <input class="form-control" type="date" name="fecha_nacimiento" value="<?php  echo $fecha_nacimiento?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button class="btn btn-primary" type="submit">Editar</button>
                    <a class="btn-btn-secundary" href="index.php">Volver</a>

                </form>

            </div>
        </div>
    </div>
    <?php require '../footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>