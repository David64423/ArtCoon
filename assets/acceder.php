<?php

    require "../sql/conec.php";

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
                switch($_SESSION['rol']){
                    case 1:
                        header("location:usuario/admin.php");
                        break;
                    case 2:
                        header("location:usuario/usuario.php");
                        break;
                        default; 
                        //ada
                        break;   
                    }
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
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/header.css">
    
</head>
<body>
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
                    <a class="__item__link" href="acceder.php">Acceder</a>
                </li>
                <li class="__lista__item">
                    <a class="__item__link" href="registrarse.php">Registrarse</a>
                </li>
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