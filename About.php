<?php
    session_start();
    $bg = 'https://upload.wikimedia.org/wikipedia/commons/9/9c/UNA.png';      
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
<body style="background-image: url('.$bg.');
height: 550px; /* You must set a specified height */
background-position: center; /* Center the image */
background-repeat: no-repeat; /* Do not repeat the image */
">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

    <h4 style="text-align: center; font-family: Times New Roman, Times, serif; font-weight: bold; padding-top: 15%;">Proyecto desarrollado por Oscar Ortiz, Pablo Gatgens y Jose Porras como parte del curso de comunicaciones y redes
    durante el primer semestre de 2021. Todos los derechos reservados</h4>
    <p style="text-align: center; font-size: 1.2em;">
        El proyecto se hizo teniendo en mente las aplicaciones que tiene la visión artificial ambito de reconocimiento facial ya que es el uso más famoso que se le atribuye, pero sabemos estamos en una epoca
        en la que el cambio es continuo, por lo que en el apartado de futuro proximo explicamos el alcance que tiene esta tecnología y porque es importante aprenderla.
    </p>
</body>
                ';
            }else{
                header('Location: login.php');
            }
        ?>
    </body>
</html>