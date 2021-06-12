<?php
    session_start();      
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header('Location: login.php');
    }      
?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Proyecto redes</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style/bootstrap.css">
        <link rel="stylesheet" href="style/bootstrap.min.css">
    </head>
    <body>
        <?php
            if(isset($_SESSION['username'])){
                echo '
            <header class="navbar navbar-expand-lg navbar-light bg-dark">
                <div class="container-flex">
                    <a class="navbar-brand text-light" href="Inicio.php">Inicio</a>
                    <a class="navbar-brand text-light" href="About.php">Acerca de</a>
                    <a class="navbar-brand text-light" href="Limitaciones.php">Limitaciones</a>
                    <a class="navbar-brand text-light" href="Vision.php">Futuro proximo</a>
                    <form method="POST" action="" style="display: inline-flex;">
                        <input type="submit" name="logout" class="btn btn-outline-light" value="Salir"/>
                    </form>
                </div>
            </header>
            <body>
                <div class="alert alert-danger" id="alerta" role="alert" style="display: none; text-align: center;"></div>
                <div class="container col-3 p-3">
                    <h6 style="text-align: center;">Indique la direccion URL desde donde se obtendra la imagen</h6>
                    <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Direccion URL" />
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="Aplicarfiltros">Aplicar filtros</label>
                        <input class="form-check-input" onclick="ocultarFiltros()" type="checkbox" id="Aplicarfiltros">
                    </div>
                    <div id="filtros" style="text-align: center;">
                        <label style="text-align: center;">Hombre</label>
                        <input class="form-check-input-inline" type="checkbox" value="Male" id="Hombre" checked>
                        <label style="text-align: center;">Mujer</label>
                        <input class="form-check-input-inline" type="checkbox" value="Female" id="Mujer" checked>
                        <br>
                        <input id="edadMin" class="form-control" type="number" name="edadMin" placeholder="Edad minima" min="0" max="100"/>
                        <input id="edadMax" class="form-control" type="number" name="edadMax" placeholder="Edad maxima" min="0" max="100"/>
                    </div>
                    <button class="btn btn-outline-dark col-12" onclick="pedir()">Buscar rostros</button>
                </div>
                <div style="width: 100%; text-align:center;">
                    <canvas id="myCanvas" width="1000" height="1000" style="border:1px solid #d3d3d3; display: inline;">
                    </canvas>
                </div>
                <script src="script/script.js"></script>
            </body>
            ';
            }else{
                header('Location: login.php');
            }
        ?>
    </body>
</html>