<?php

    require "assets/conec.php";

    if(isset($_POST['pass'])){
    $usu = $_POST['user'];
    $pas = $_POST['pass'];
    echo $usu;
    echo "<br>";
    echo $pas;
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
        <p><a href="index.html">artcoon</a></p>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
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