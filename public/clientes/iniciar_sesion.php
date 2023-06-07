<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Login</title>
    <style>
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
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-size: cover;
    
    }

    .form-container {
        background-color: white;
        padding: 5%;
        border-radius: 20px;

    }
    </style>
</head>

<body>
    <div id="bg-image">
        <div class="container">
            <?php
        require '../../util/base_de_datos.php';
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $usuario=$_POST["usuario"];
            $contrasena=$_POST["contrasena"];

            $sql= "SELECT * FROM clientes WHERE usuario='$usuario'";
            $resultado = $conexion -> query($sql);

            if($resultado -> num_rows > 0){
                while($fila = $resultado -> fetch_assoc()){
                    $hash_contrasena=$fila["contrasena"];
                    $rol=$fila["rol"];

                }
                $acceso_valido=password_verify($contrasena,$hash_contrasena);

                if($acceso_valido==TRUE){
                    ?><div class="alert alert-success" role="alert"><button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Close"><?php echo "<p>Login exitosa</p>";?></button></div><?php 

                    session_start();
                    $_SESSION["usuario"]=$usuario;
                    $_SESSION["rol"]=$rol;

                    header("location: http://localhost/Animehope/Animehope/public/index.php");
                }else{
                        ?>
                            <div class="alerta">
                                <div class="alert alert-danger" role="alert">
                                    error en el usuario o contraseña
                                </div>
                            </div>
                        <?php
                    
                }
            }
        }

        ?>
        <div class="container">
            <div class="form-container">
                <div class="row">
                    <div class="col-6">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label class="form-label">Usuario</label>
                                <input class="form-control" name="usuario" type="text">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">contraseña</label>
                                <input class="form-control" name="contrasena" type="password">
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-primary" type="submit">Iniciar Sesion</button>
                                <br>
                                <br>
                                <a class="btn btn-secondary" href="registrarse.php">Registrarse</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>