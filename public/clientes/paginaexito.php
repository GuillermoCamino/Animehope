<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Exito</title>
</head>
<body>
<div class="container">
        <?php require '../../util/control_de_acceso.php' ?>
        <?php require '../header.php' ?>
        <?php require '../../util/base_de_datos.php' ?>
    <h1>Compra realizada</h1>
    <h2>Muchas gracias por confiar en AnimeHope</h2>

    <img src="Animehopeicon.png">

    <a class="btn-btn-primary" href="../index.php">Volver</a>

    <?php require '../footer.php' ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>
</html>