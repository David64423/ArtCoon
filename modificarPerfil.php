<?php
require "assets/conec.php";

session_start();
$_SESSION['id'] ;
$_SESSION['usu'] ;
$_SESSION['email'] ;
$_SESSION['rol'] ;

if($_SESSION['rol']==1 or $_SESSION['rol']==2){



$con = mysqli_connect($serv,$usu,$pass,$bd);

$id=$_SESSION['id'];
$sqlmostrar="select * from usuarios where usu_id=$id;";

$resulset=mysqli_query($con,$sqlmostrar);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Perfil</title>
</head>
<body>
    <h1>Editar datos:</h1><br><br>
    <form action="" method="POST">
        <table>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Contraseña</th>
            </tr>
            <?php
                while($registro=mysqli_fetch_row($resulset))
                {
            ?>
            <tr>
                <td><?php echo $registro[0]?></td>
                <td><input type="text" value="<?php echo $registro[1]?>" name='usu_nick'></td>
                <td><input type="text" value="<?php echo $registro[4]?>" name='usu_pass'></td>
                <td><input type="submit"  value="Actualizar"></td>
            </tr>
            <?php
                }
            ?>
        </table>
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
