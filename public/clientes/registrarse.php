<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>registro</title>
    <style>
    h1{
        display:flex;
        justify-content:center;
    }
    .alerta {
        margin-left:30%;
        margin-bottom: 430px;
        width: 100%;
    }

    #bg-image {
        background-image: url("../../resources/images/FondoAnime.jpg");
        background-repeat: no-repeat;
        background-size: cover;
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
    </style>
</head>

<body>
    <?php
        require '../../util/base_de_datos.php' ;
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $usuario=$_POST["usuario"];
        $apellido_1=$_POST["apellido_1"];
        $apellido_2=$_POST["apellido_2"];
        $fecha_nacimiento=$_POST["fecha_nacimiento"];
        $contrasena=$_POST["contrasena"];
        $nombre=$_POST["nombre"];
        $rol=$_POST["rol"];

        $hash_contrasena=password_hash($contrasena,PASSWORD_DEFAULT);

        $sql= "INSERT INTO clientes (usuario,nombre,apellido_1,apellido_2,fecha_nacimiento,contrasena,rol) VALUES ('$usuario','$nombre','$apellido_1','$apellido_2','$fecha_nacimiento','$hash_contrasena','$rol')";
        if($conexion -> query($sql)=="TRUE"){
            ?>               
            <div class="alert alert-info" role="alert"><?php echo "<p>cliente insertado</p>"; ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php
            header("location: iniciar_sesion.php");

        }else{
            ?>               
                <div class="alert alert-danger" role="alert"><?php echo "<p>Error al insertar</p>"; ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php
        }
    }
    ?>
        <h1 id=titulo>Registrate</h1>
    <div class="container">
        <div class="container">
            <div class="form-container">
                <div class="row">
                    <div class="col-12">
                        <form action="" method="post">
                            <div class="col-20">
                                <label class="form-label">Usuario</label>
                                <input class="form-control" name="usuario" type="text">
                            </div>
                            <div class="col-17">
                                <label class="form-label">nombre</label>
                                <input class="form-control" name="nombre" type="text">
                            </div>
                            <div class="col-17">
                                <label class="form-label">Apellido1</label>
                                <input class="form-control" name="apellido_1" type="text">
                            </div>
                            <div class="col-17">
                                <label class="form-label">Apellido2</label>
                                <input class="form-control" name="apellido_2" type="text">
                            </div>
                        
                            <div class="col-17">
                                <label class="form-label">contraseña</label>
                                <input class="form-control" name="contrasena" type="password">
                            </div>
                            <div class="col-20">
                                <label class="form-label">fecha_nacimiento</label>
                                <input class="form-control" type="date" name="fecha_nacimiento">
                            </div>
                            <div class="col-20">
                                <label class="form-label">Rol</label>
                                <select class="form-select" name="rol">
                                <option value="" select disabled hidden> -- selecciona un rol -- </option>
                                <!-- <option value="administrador">Administrador</option> -->
                                <option value="usuario">Usuario</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-primary" type="submit">Registrarse</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>