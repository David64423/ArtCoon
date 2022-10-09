<?php
    require "../sql/conec.php";
    require "../components/funciones.php";
    
    if(isset($_POST['email'])){
        $usu = $_POST['usuario'];
        $email = $_POST['email'];
        $pas = $_POST['pass'];
        $idioma = $_POST['idioma'];

        if(verificarRegistros('usu_nick',$usu,'usuarios',$con)){
            echo "Este usuario ya existe en el sistema, por favor elija otro";
        }else if(verificarRegistros('usu_email',$email,'usuarios',$con)){
            echo "Este EMAIL ya existe en el sistema, por favor elija otro";
        }else {
            $query1 = "insert into usuarios (usu_nick,idioma_id,usu_email,usu_pass,rol_id) values ('$usu',$idioma,'$email','$pas',2);";
            $consulta1 = mysqli_query($con,$query1);

            if(mysqli_affected_rows($con) > 0){
                echo "Te has registrado";
            }
        }

        
    }
    
    $consulta2 = mysqli_query($con,selectTodo('idioma'));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtConn | Registrarse</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/variables.css">
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
        <form action="#" method="POST">
            <label for="user">Ingrese su usuario</label>
            <input type="text" name="usuario" id="user">
            <label for="email">Ingrese su email</label>
            <input type="text" name="email" id="email">
            <label for="pass">Ingrese su contraseña</label>
            <input type="password" name="pass" id="pass">

            <label for="idiomas">Seleccione su idioma de preferencia</label>
            <select name="idioma" id="idiomas">
                <?php while($dato = mysqli_fetch_assoc($consulta2)){?>
                <option value="<?php echo $dato['idioma_id']; ?>"><?php echo $dato['idioma_desc']; ?></option>
                <?php }?>
            </select>

            <button>¡ Registrarme !</button>
        </form>
    </main>
    <footer>
        
    </footer>
    <script src="js/java.js"></script>
</body>
</html>