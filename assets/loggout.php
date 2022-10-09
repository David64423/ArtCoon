<?php
session_start();
echo "Hasta luego ".$_SESSION['usu'];
session_destroy();

?>
<?php
header("location:../index.php");
?>