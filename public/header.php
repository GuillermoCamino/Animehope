<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="./AnimehopeIcon.png" width="40" height="50" class="d-inline-block align-top" alt="">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <!--<img src="../resources/images/AnimehopeIcon.png" alt="Logo" width="40" height="50">
                <img src="../../resources/images/AnimehopeIcon.png" alt="Logo" width="40" height="50">-->

                <a class="nav-link active" aria-current="page"
                    href="http://localhost/Animehope/public/">Inicio</a>

                <?php
          if ($_SESSION["rol"] == "administrador") {
        ?>
                <a class="nav-link"
                    href="http://localhost/Animehope/public/figuras/insertar_figura.php">Figuras</a>
                <a class="nav-link"
                    href="http://localhost/Animehope/public/clientes/insertar_cliente.php">Clientes 
                <?php
          }
        ?>
                <a class="nav-link" href="http://localhost/Animehope/public/compras/comprar_figura.php">Nueva
                    compra</a>
                <a class="nav-link" href="http://localhost/Animehope/public/clientes/mis_compras.php">Mis
                    compras</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Marcas
                        <span
                        class="badge bg-success">New</span></a>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                                href="http://localhost/Animehope/public/figuras/marcas/banpresto.php">Banpresto</a>
                        </li>
                        <li><a class="dropdown-item" href="http://localhost/Animehope/public/figuras/marcas/noodlecupholder.php">NoodleCupHolder</a></li>
                        <li><a class="dropdown-item" href="http://localhost/Animehope/public/figuras/marcas/squarenix.php">squarenix</a></li>
                        <li><a class="dropdown-item" href="http://localhost/Animehope/public/figuras/marcas/nendoroid.php">nendoroid</a></li>
                        <li><a class="dropdown-item" href="http://localhost/Animehope/public/figuras/marcas/goodsmilecompany.php">goodsmilecompany</a></li>
                        <li><a class="dropdown-item" href="http://localhost/Animehope/public/figuras/marcas/antiguas.php">Antiguas</a></li>

                    </ul>
                </li>
                </ul>
                <a class="nav-link"
                    href="http://localhost/Animehope/public/desconectarse.php">Desconectarse</a>
                <a class="nav-link" href="">Bienvenid@ <?php echo $_SESSION["usuario"] ?></a>
            </div>
        </div>
    </div>
</nav>