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
                <h3 style="text-align: center; font-family: Times New Roman, Times, serif; font-weight: bold;">La visión artificial ayuda a resolver tareas industriales completas en forma confiable y consistente</h3>
                <p>La visión artificial se puede definir como <b>"una disciplina científica que incluye métodos para adquirir, procesar y analizar imágenes del mundo real
                    con el fin de producir información que pueda ser tratada por una máquina"</b>. Durante los últimos años ha venido adquiriendo relevancia a nivel mundial debido
                     a su infinidad de aplicaciones en distintos ambitos como la seguridad y la medicina, pero lo más beneficiado han sido los procesos industriales debido a lo que 
                     se conoce como la cuarta revolución industrial.
                </p>
                <p>
                     Uno de los grandes motivos por los que los sistemas de visión artificial han tomado protagonismo
                     en la transición hacia la <a target="_blank" href="https://www.bbc.com/mundo/noticias-37631834"><b>cuarta revolución industrial</b></a> es por su capacidad para tomar, medir y analizar datos que se 
                     convierten en información de gran valor para el control de procesos industriales, su optimización y
                      la obtención de productos de mejor calidad. A continuación se mencionan algunas áreas de aplicación: control de calidad, clasificación, contaje de productos, posicionamiento de mercadería, etc...
                </p>
                <div class="container pb-6" style="text-align: center;">
                    <img width="800" height="300" src="https://upload.wikimedia.org/wikipedia/commons/c/c8/Industry_4.0.png" alt=""/>
                </div>
                <p>
                    En el futuro próximo veremos una era de fábricas inteligentes que integrarán lo físico con lo virtual, donde los fabricantes y maquinas compartirán información con la cadena de suministro y donde los
                     procesos pueden ser optimizados automáticamente, ser auto-configurables y usar inteligencia artificial para completar tareas difíciles basadas en flujos de trabajo complejos.
                    Por otro lado la fabricación bajo demanda para prototipos personalizados y piezas en producciones de tiradas cortas es una de las áreas de más rápido crecimiento en la industria
                     gracias a los avances en la fabricación aditiva la cual involucra visión artificial para el control de calidad.
                </p>
                <p>
                    Esta nueva revolución industrial involucrará mucho más de las tecnologías y herramientas como por ejemplo, la realidad virtual aumentada, el IoT (Internet of Things), inteligencia y visión artificial, 
                    asistentes virtuales, Big Data, cloud computing, programas modernos de diseño y de simulación de procesos, la impresión 3D, seguridad, la nano y biotecnología o la computación cuántica, entre otras.
                </p>
                <h5 style="text-align: center; font-weight: bold;">La carrera por la automatización no pasa desapercibida cuando se calcula que esta nueva era industrial aportará más de 14 billones de dólares a la economía mundial en una década. Una gran motivación para
                que todos los países quieren explotar sus posibilidades y ser referentes.</h5>
                <h5>Referencias</h5>
                <table class="table table-striped table-sm">
                    <tbody>
                        <tr><td>https://es.wikipedia.org/wiki/Visi%C3%B3n_artificial</td></tr>
                        <tr><td>https://blog.infaimon.com/sistemas-de-vision-artificial-tipos-aplicaciones/</td></tr>
                        <tr><td>https://blog.infaimon.com/vision-artificial-procesos-industriales/</td></tr>
                        <tr><td>https://www.contaval.es/que-es-la-vision-artificial-y-para-que-sirve/</td></tr>
                        <tr><td>https://www.cic.es/industria-40-revolucion-industrial/</td></tr>
                        <tr><td>https://blog.infaimon.com/vision-artificial-industrial-industria-4-0/</td></tr>
                    </tbody>
                </table>
            </body>
                ';
            }else{
                header('Location: login.php');
            }
        ?>
    </body>
</html>