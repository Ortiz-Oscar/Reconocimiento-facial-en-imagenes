<?php
    require 'Azure.php';
    $azure = new Computer_Vision();
    if (!empty($_POST['direccion'])) {
        $imgurl = $_POST['direccion'];
        $azure->recognizeURL($imgurl);
    }
?>
