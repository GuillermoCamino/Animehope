<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .dark-mode {
            background-color: #222;
            color: #fff;
        }
    </style>
</head>

<body class="dark-mode">
    <button id="dark-mode-toggle">Modo Oscuro</button>
    <script>
        $(document).ready(function () {
            $('#dark-mode-toggle').click(function () {
                $('body').toggleClass('dark-mode');
            });
        });

    </script>
</body>

</html>