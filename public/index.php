<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>inicio</title>
    <style>
    body {
        background-color: white;
    }
    h2{
        color:black;
        display:flex;
        justify-content:center;
    }
    #carouselExampleIndicators {
        width: 100%;
        max-width:100%;
        height: 40%;
        margin-left: auto;
        margin-right: auto;
        background-color:black
    }
    #miku{
        height:20%;
    }
    .imagen{
        float: left; 
        margin-right: 40px;
        height:200px;
        width: 20%;
        box-shadow: 2px 2px 7px rgba(0, 0, 0, 0.5);
    }
    .imagen:hover{
        transform: scale(1.2); 
        transition: transform 0.3s ease;

    }
    img{
        border:10px;
    }
    #buscar{
        margin:10px;
    }
    </style>
    
</head>

<body>
    
    <?php require '../util/control_de_acceso.php' ?>
    <div class="container">
        <?php require 'header.php' ?>

        <br>
        <h1>¡Bienvenid@ a nuestra tienda!</h1>
        <form action="buscador.php" method="GET">
            <input type="text" name="buscar" id="buscar">
            <button type="submit">Buscar</button>
        </form>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../resources/images/figuras/FiguraPower1.png" class="d-block w-70" alt="..." width=800
                        height=600>
                </div>
                <div class="carousel-item">
                    <img src="../resources/images/figuras/figuraGojo2.png" class="d-block w-70" alt="..." width=800
                        height=600>
                </div>
                <div class="carousel-item">
                    <img src="../resources/images/figuras/mikuBacterial1.png" class="d-block w-70" alt="..." width=800
                        height=600>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <br><br>

        </div>
        <h2>Figuras destacadas</h2>
            <a href="./figuras/mostrar_figura.php?id=43"><img src="../resources/images/figuras/figuraGojo2.png" class="imagen" alt="figura gojo"></a>
            <a href="./figuras/mostrar_figura.php?id=46"><img src="../resources/images/figuras/figuraSailorMoon1.png" class="imagen" alt="figura sailon moon">
            <a href="./figuras/mostrar_figura.php?id=44"><img src="../resources/images/figuras/mikubacterial1.png" class="imagen" alt="figura miku"></a>
            <a href="./figuras/mostrar_figura.php?id=45"><img src="../resources/images/figuras/figurapower1.png" class="imagen" alt="figura power"></a>
    </div>
    <br><br><br>
    <br>
    <br><br>
    <br><br>
    <?php require 'footer.php' ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>
</html>
