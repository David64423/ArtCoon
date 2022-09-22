<?php

    require "assets/conec.php";

    if(isset($_POST['pass'])){

        $usu = $_POST['user'];
        $pas = $_POST['pass'];
        
        $query1 = "select * from usuarios where usu_nick = '$usu';";
        $verif1 = mysqli_query($con,$query1);
        $datos = mysqli_fetch_assoc($verif1);

        if(mysqli_affected_rows($con) > 0){
            if($pas == $datos['usu_pass']){
                session_start();
                $_SESSION['id'] = $datos ['usu_id'];
                $_SESSION['usu'] = $datos['usu_nick'];
                $_SESSION['email'] = $datos['usu_email'];
                $_SESSION['rol'] = $datos['rol_id'];

            }else{
                echo "Contraseña incorrecta";
            }
        }else{
            echo "usuario incorrecto";
        }

    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtConn | Acceder</title>
</head>
<body>
    <header>
        <p><a href="index.php">artcoon</a></p>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="#" method="post">
            <label for="usu">Ingrese su usuario</label>
            <input type="text" name="user" id="usu">
            <label for="pass">Ingrese su contraseña</label>
            <input type="password" name="pass" id="pass">
            <button>Acceder</button>
        </form>
        <a href="registrarse.php">Registrarse</a>
    </main>
    <footer>

    </footer>
    <script src="js/java.js"></script>
</body>
</html>