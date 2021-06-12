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
    <h3 style="text-align: center;">En este apartado se exponen los limitantes que afectan negativamente la aplicación</h3>
    <br>
    <h4 style="text-align: center;">Punto de vista</h4>
    <div class="d-inline-flex border border-bottom-0">
        <img src="PuntoVista.jpg" width="250" height="250" alt="Perspectivas">
        <p class="d-inline-flex"> La visión artificial es muy dependiente de la perspectiva de la imagen que se le presenta. Para efectos del proyecto puede que en ciertas ocasiones no detecte rostros
    debido a que la percepción de rostros en las imagenes se ve limitada al frente de la cara y no a las distintas direcciones desde donde se puede percibir un rostro</p>
    </div>
    <h4 style="text-align: center;">Resolución de la imagen</h4>
    <div class="d-inline-flex border border-bottom-0">
        <p class="d-inline-flex"> El tamaño de la imagen ingresada en la aplicación puede afectar el reconocimiento debido a mayor calidad de resolución, mejor es el reconocimiento. En imagenes de baja resolución puede ocurrir
            que no consiga identificar rostros aunque los hubiera por la nula diferenciación entre pixeles y otros factores manejados por el modelo de computer visión.
        </p>
    <img src="https://pc-solucion.es/wp-content/uploads/2019/01/que-es-el-1080i-1024x578.jpg" width="300" height="250" alt="Resoluciones">
    </div>
    <h4 style="text-align: center;">Filtros en imagen</h4>
    <div class="d-inline-flex border border-bottom-0">
        <img src="https://i.pinimg.com/originals/21/1c/89/211c896dc3dc3efaab3b760a53b5513b.jpg" width="300" height="250" alt="Resoluciones">
        <p class="d-inline-flex"> La deformación de las imagenes puede causar la difuminación de pixeles y alterar el resultado del reconocimiento debido a que el modelo de vision artificial podría malinterpretar los pixeles y sacar conclusiones
            incorrectas o no encontrar del todo rostros
        </p>
    </div>
    <h4 style="text-align: center;">Fondo desordenado</h4>
    <div class="d-inline-flex border border-bottom-0">
        <p class="d-inline-flex"> La cantidad de tonalidades presentes en fondos desordenados causa que el modelo no pueda encontrar patrones de distincion de rostros, lo cual se refleja en el resultado final no encontrando del todo resultados
        </p>
        <img src="https://www.skillshare.com/blog/wp-content/uploads/2018/01/ScreenShot2021-01-12at2.14.11PM.png" width="300" height="250" alt="Resoluciones">
    </div>
</body>
                ';
            }else{
                header('Location: login.php');
            }
        ?>
    </body>
</html>