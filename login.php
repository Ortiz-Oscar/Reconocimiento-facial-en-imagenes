<?php
if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(isset($username,$password)){
                $ldapconfig['basedn'] = 'dc=redes,dc=tigre';//CHANGE THIS TO THE CORRECT BASE DN
                $ldapconfig['usersdn'] = 'cn=users';//CHANGE THIS TO THE CORRECT USER OU/CN
                $conexion=ldap_connect('ldap://10.2.0.6:389') or die("No se pudo conectar al host ldap");//Direccion IP de la maquina virtual con Activa directory

                ldap_set_option($conexion, LDAP_OPT_PROTOCOL_VERSION, 3);
                ldap_set_option($conexion, LDAP_OPT_REFERRALS, 0);
                if ($bind = ldap_bind($conexion, $username, $password)) {
                        //echo("Inicio de sesión correcto");//REPLACE THIS WITH THE CORRECT FUNCTION LIKE A REDIRECT;
                        header("Location: Inicio");
                } else {
                        echo "Nombre de usuario o contrasenna incorrecta";
                }
        }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Inicio de sesion</title>
        <link rel="stylesheet" href="style/bootstrap.css">
        <link rel="stylesheet" href="style/bootstrap.min.css">
    </head>
    <body>
        <h1 style="text-align:center;">Inicio de sesión</h1>
        <div class="form" style="text-align:center;">
            <form action="" method="post">
                <div><input name="username" class="form-control-md" placeholder="Nombre de usuario"></div>
                <div><input type="password" class="form-control-md" name="password" placeholder="Contrasenna"></div>
                <input type="submit" value="Iniciar sesion">
            </form>
        </div>
    </body>
</html>