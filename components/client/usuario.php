<?php
//seguridad de session
session_start();

if($_SESSION['rol']==2){


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <header>
        <p><a href="../index.php">artcoon</a></p>
        <nav>
            <ul>
                <li><a href="../acceder.php">Acceder</a></li>
                <li><a href="../modificarPerfil.php">Modificar perfil</a></li>
            </ul>
        </nav>
    </header>
    <h1> Usuarios</h1>
      <?php 
       echo "Bienvenido ".$_SESSION['usu'];
        ?>
     <form action=loggout.php>
        <?php
         echo "Sesion iniciado como ".$_SESSION['usu'];
         ?>
        <input  type=submit value="Cerrar Sesion">

    </form>
      
</body>
</html>
<?php
 }

 else{
     echo "ACCESO NO AUTORIZADO";
     exit();
 }

?>
