<?php
require "../sql/conec.php";

session_start();
// Obtener datos de sesión
$id = $_SESSION['id'] ?? null;
$user = $_SESSION['usu'] ?? null;
$email = $_SESSION['email'] ?? null;
$rol = $_SESSION['rol'] ?? null;

// Verificar rol para permitir el acceso
if ($rol == 1 || $rol == 2) {

    $con = mysqli_connect($serv, $usu, $pass, $bd);

    // Obtener datos del usuario
    $sqlmostrar = "SELECT * FROM usuarios WHERE usu_id=$id";
    $resulset = mysqli_query($con, $sqlmostrar);

    // Procesar la actualización
    if (isset($_POST['actualizar'])) {
        $nick = mysqli_real_escape_string($con, $_POST['usu_nick']);
        $pass = mysqli_real_escape_string($con, $_POST['usu_pass']);
        $email = mysqli_real_escape_string($con, $_POST['usu_email']);

        $update = "UPDATE usuarios SET usu_nick='$nick', usu_pass='$pass', usu_email='$email' WHERE usu_id=$id";

        $result = mysqli_query($con, $update);

        if ($result) {
            // Mensaje de confirmación
            echo "<script>alert('Datos actualizados correctamente.');</script>";
        } else {
            // Mensaje de error
            echo "Error al actualizar los datos: " . mysqli_error($con);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/variables.css">
</head>

<body>
    <!-- Encabezado -->
    <header class="header">
        <div class="header__logo">
            <p>
                <a href="index.php">artcoon</a>
            </p>
        </div>
        <nav class="header__menu">
            <ul class="header__menu__lista">
                <li class="__lista__item">
                    <a class="__item__link" href="../index.php">Home</a>
                </li>
                <li class="__lista__item">
                    <a class="__item__link" href="assets/acceder.php">Acceder</a>
                </li>
                <li class="__lista__item">
                    <a class="__item__link" href="assets/registrarse.php">Registrarse</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
    <h1>Editar datos:</h1><br><br>
    <form action="" method="POST">
        <table class="table table-bordered ">
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Mail</th>
                <th></th>
            </tr>
            <?php
            while ($registro = mysqli_fetch_assoc($resulset)) {
            ?>
                <tr>
                    <td><?php echo $registro['usu_id'] ?></td>
                    <td><input type="text" value="<?php echo $registro['usu_nick'] ?>" name='usu_nick'></td>
                    <td><input type="text" value="<?php echo $registro['usu_pass'] ?>" name='usu_pass'></td>
                    <td><input type="text" value="<?php echo $registro['usu_email'] ?>" name='usu_email'></td>
                    <td><input type="submit" value="Actualizar" name="actualizar"></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </form>
    </div>
</body>

</html>
<?php
 }

 else{
     echo "ACCESO NO AUTORIZADO";
     exit();
 }

?>
