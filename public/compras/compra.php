
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Formulario de pago con tarjeta de crédito</title>
</head>

<body>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="procesar-pago.php">
            <div class="form-group mb-3">
                <label class="form-label" for="nombre-tarjeta">Nombre en la tarjeta:</label>
                <input class="form-control" type="text" id="nombre-tarjeta" name="nombre-tarjeta" required>

                <label class="form-label" for="numero-tarjeta">Número de tarjeta:</label>
                <input class="form-control" type="text" id="numero-tarjeta" name="numero-tarjeta" required>

                <label class="form-label" for="fecha-expiracion">Fecha de expiración:</label>
                <input class="form-control" type="month" id="fecha-expiracion" name="fecha-expiracion" required>

                <label class="form-label" for="cvv">CVV:</label>
                <input class="form-control" type="text" id="cvv" name="cvv" required>

                <button class="btn btn-primary" type="submit">Pagar</button>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                crossorigin="anonymous">
            </script>
</body>

</html>
