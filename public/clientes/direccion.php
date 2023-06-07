<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Direccion</title>
</head>

<body>
    <div class="container">
        <?php require '../../util/control_de_acceso.php' ?>
        <?php require '../header.php' ?>
        <?php require '../../util/base_de_datos.php' ?>
        <?php
    function depurar($dato)
    {
    $dato=trim($dato);
    $dato=stripslashes($dato);
    $dato=htmlspecialchars($dato);
    return $dato;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ciudad= depurar($_POST["ciudad"]);
  $poblacion= depurar($_POST["poblacion"]);
  $codigo_postal= depurar($_POST["codigo_postal"]);
  $calle= depurar($_POST["calle"]);
  $piso= depurar($_POST["piso"]);
  if(isset($_POST["pais"])){
    $pais= depurar($_POST["pais"]);
   }else{
    $pais="";
   }
   if (empty($ciudad)) {
    $err_ciudad="El campo es obligario";
   }else {
    if(strlen($ciudad)>30){
        $err_ciudad="Demasiado largo";
    }else {
        $ciudad=$ciudad;
    }
   }
   if (empty($poblacion)) {
    $err_poblacion="El campo es obligario";
   }else {
    if(strlen($poblacion)>40){
        $err_poblacion="Demasiado largo";
    }else {
        $poblacion=$poblacion;
    }
   }
   if (empty($codigo_postal)) {
    $err_codigo_postal="El campo es obligario";
   }else {
    $codigo_postal=filter_var($codigo_postal,FILTER_VALIDATE_INT);
    if(!$codigo_postal){
        $err_codigo_postal="El codigo postal debe ser un numero";
    }else {
        if($codigo_postal<0){
            $err_codigo_postal="El codigo postal no puede ser negativo";
        }elseif ($codigo_postal>30000) {
            $err_codigo_postal="El codigo postal no puede tener mas de 5 cifras";
        }else {
            $codigo_postal=$codigo_postal;
        }
    }
   }
   if (empty($calle)) {
    $err_calle="El campo es obligario";
   }else {
    if(strlen($calle)>40){
        $err_calle="Demasiado largo";
    }else {
        $calle=$calle;
    }
   }
   if (empty($piso)) {
    $err_piso="El campo es obligario";
   }else {
    if(strlen($piso)>50){
        $err_piso="Demasiado largo";
    }else {
        $piso=$piso;
    }
   }
    $sql="INSERT INTO direccion(pais,ciudad,poblacion,codigo_postal,calle,piso) VALUES ('$pais','$ciudad','$poblacion','$codigo_postal','$calle','$piso')";
   
   if($conexion -> query($sql)=="TRUE"){
    echo "<p>direccion insertada</p>";
   }else{
    echo "<p>Error al insertar</p>";
   
   }
}
?>
        <a class="btn-btn-primary" href="../index.php">Volver</a>
        <h1>Nueva Direccion</h1>
        <div class="row">
            <div class="col-6">
                <form action="paginaexito.php" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label">Pais</label>
                        <select class="form-select" name="pais">
                        <option value="" select disabled hidden> -- select an option -- </option>
                        <option value="espana">España</option>
                        <option value="francia">Francia</option>
                        <option value="portugal">Portugal</option>
                        </select>
                        <span class="error">
                            * <?php if(isset($err_pais)) echo $err_pais ?>
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Ciudad</label>
                        <input class="form-control" type="text" name="ciudad">
                        <span class="error">
                            * <?php if(isset($err_ciudad)) echo $err_ciudad ?>
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Poblacion</label>
                        <input class="form-control" type="text" name="poblacion">
                        <span class="error">
                            * <?php if(isset($err_poblacion)) echo $err_poblacion ?>
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Codigo postal</label>
                        <input class="form-control" type="text" name="codigo_postal">
                        <span class="error">
                            * <?php if(isset($err_codigo_postal)) echo $err_codigo_postal ?>
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Calle</label>
                        <input class="form-control" type="text" name="calle">
                        <span class="error">
                            * <?php if(isset($err_calle)) echo $err_calle ?>
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">piso escaleras etc</label>
                        <input class="form-control" type="text" name="piso">
                        <span class="error">
                            * <?php if(isset($err_piso)) echo $err_piso ?>
                        </span>
                    </div>
                    <button class="btn btn-primary" type="submit">Crear</button>
                    <a class="btn-btn-secundary" href="../index.php">Volver</a>

                </form>
            </div>
        </div>
    </div>
    <?php require '../footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    </div>
</body>

</html>