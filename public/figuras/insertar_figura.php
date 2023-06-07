<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Insertar figura</title>
    <style>
    .alerta {
        margin-left:30%;
        margin-bottom: 430px;
        width: 100%;
    }
    h1{
        display:flex;
        justify-content:center;
        align-items:center;
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
<style>
    .error{
        color:red;
    }
</style>
<body>
    <?php
     session_start();
     if(!isset($_SESSION["usuario"])){
         header("location: http://localhost/Animehope/Animehope/public/iniciar_sesion.php");
     }else{
     echo "<p> Has iniciado sesión ". $_SESSION["usuario"]."</p>"; 
     }
     ?>
    <?php 
require '../../util/base_de_datos.php';
require '../header.php';
function depurar($dato)
{
$dato=trim($dato);
$dato=stripslashes($dato);
$dato=htmlspecialchars($dato);
return $dato;
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
$temp_nombre= depurar($_POST["nombre"]);
$temp_tamanio= depurar($_POST["tamanio"]);
$temp_precio= depurar($_POST["precio"]);
$temp_anio= depurar($_POST["anio"]);
if(isset($_POST["marca"])){
 $temp_marca= depurar($_POST["marca"]);
}else{
 $temp_marca="";
}

if (empty($temp_nombre)) {
 $err_nombre="El campo es obligario";
}else {
 if(strlen($temp_nombre)>40){
     $err_nombre="Demasiado largo";
 }else {
     $nombre=$temp_nombre;
 }
}

if (empty($temp_tamanio)) {
 $err_tamanio="El campo es obligario";
}else {
     $tamanio=$temp_tamanio;
}

if (empty($temp_precio)) {
 $err_precio="El campo es obligario";
}else {
 $temp_precio=round($temp_precio,2);
 $temp_precio=filter_var($temp_precio,FILTER_VALIDATE_FLOAT);
 if(!$temp_precio){
     $err_precio="El precio debe ser un numero";
 }else {
     if($temp_precio<0){
         $err_precio="El precio no puede ser negativo";
     }elseif ($temp_precio>=10000) {
         $err_precio="El precio no puede ser igual o superior a 10000";
     }else {
         $precio=$temp_precio;
     }
 }
}
if (empty($temp_anio)) {
    $err_anio="El campo es obligario";
   }else {
    $temp_anio=round($temp_anio,2);
    $temp_anio=filter_var($temp_anio,FILTER_VALIDATE_FLOAT);
    if(!$temp_anio){
        $err_anio="El año debe ser un numero";
    }else {
        if($temp_anio<0){
            $err_anio="El año no puede ser negativo";
        }elseif ($temp_anio>=2026) {
            $err_anio="El año no puede ser igual o superior a 2026";
        }else {
            $anio=$temp_anio;
        }
    }
   }
$file_name=$_FILES["imagen"]["name"];
$file_temp_name=$_FILES["imagen"]["tmp_name"];
$file_size = $_FILES["imagen"]["size"];
$file_type = $_FILES["imagen"]["type"];
$path="../../resources/images/figuras/". $file_name;

if (empty($temp_marca)) {
 $err_marca = "la marca es obligatoria";
}else{
 
     $marca = $temp_marca;
 }
}

if (empty($file_name)) {
    $err_imagen = "La imagen es obligatoria";
   } else {
    $file_size = $_FILES["imagen"]["size"];
   
    if ($file_size > 2000000) {
        $err_imagen = "La imagen no puede pesar más de 2 MB";
    } else {
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
   
        $extension_valida = match($extension) {
            "jpg" => true,
            "jpeg" => true,
            "png" => true,
            default => false
        };
   
        if (!$extension_valida) {
            $err_imagen = "La imagen tiene que ser .png, .jpg o .jpeg";
        } else {
            $new_file_name = "figura_" . $temp_nombre 
                . "." . $extension;
   
            $path = "../resources/" . $new_file_name;
   
            $file_temp_name = $_FILES["imagen"]["tmp_name"];
   
            if (move_uploaded_file($file_temp_name, $path)) {
                echo "<p>Fichero movido con éxito</p>";
            } else {
                echo "<p>Fracaso</p>";
            }
        }
    }
   
if(!empty($nombre)&&!empty($tamanio)&&!empty($precio)){
 if(move_uploaded_file($file_temp_name, $path)){
     echo "<p>Fichero movido con exito</p>";
 }else {
     echo "<p>No se pudo mover el fichero</p>";
 }
$imagen="../resources/images/figuras/". $file_name;

if(!empty($marca)){
 $sql="INSERT INTO figuras(nombre,tamanio,precio,marca,imagen,anio) VALUES ('$nombre','$tamanio','$precio','$marca','$imagen',$anio)";
}else {
 $sql="INSERT INTO figuras(nombre,tamanio,precio,marca,imagen,anio) VALUES ('$nombre','$tamanio','$precio','$marca','$imagen',$anio)";
}

if($conexion -> query($sql)=="TRUE"){
 echo "<p>Figura insertada</p>";
}else{
 echo "<p>Error al insertar</p>";
}
}
}

    ?>
    <h1>Nueva figura</h1>
<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mb-6">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre">
                    <span class="error">
                        * <?php if(isset($err_nombre)) echo $err_nombre ?>
                    </span>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">tamaño</label>
                    <input class="form-control" type="text" name="tamanio">
                    <span class="error">
                        * <?php if(isset($err_tamanio)) echo $err_tamanio ?>
                    </span>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Precio</label>
                    <input class="form-control" type="text" name="precio">
                    <span class="error">
                        * <?php if(isset($err_precio)) echo $err_precio ?>
                    </span>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Marca</label>
                    <select class="form-select" name="marca">
                        <option value="" select disabled hidden> -- select an option -- </option>
                        <option value="Banpresto">Banpresto</option>
                        <option value="GoodSmileCompany">GoodSmileCompany</option>
                        <option value="Furyu">Furyu</option>
                        <option value="Nendoroid">Nendoroid</option>
                        <option value="SquareEnix">SquareEnix</option>
                        <option value="Bandai">Bandai</option>
                        <option value="NoodleCupHolder">NoodleCupHolder</option>
                    </select>
                    <span class="error">
                        * <?php if(isset($err_marca)) echo $err_marca ?>
                    </span>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">año Lanzamiento</label>
                    <input class="form-control" type="text" name="anio">
                    <span class="error">
                        * <?php if(isset($err_anio)) echo $err_anio ?>
                    </span>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Imagen</label>
                    <input class="form-control" type="file" name="imagen">
                    <span class="error">
                        * <?php if(isset($err_imagen)) echo $err_imagen ?>
                    </span>
                </div>
                <button class="btn btn-primary" type="submit">Crear</button>
                <a class="btn-btn-secundary" href="index.php">Volver</a>

            </form>

        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <?php require '../footer.php' ?>
</div>

</body>

</html>