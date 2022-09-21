<?php 

#region Verificar campos en la base de datos
function verificarRegistros($campo,$variable,$tabla,$conexion){

        $query = "select $campo = '$variable' from $tabla;";
        $consulta = mysqli_query($conexion,$query);

        if(mysqli_affected_rows($conexion) > 0){
            return true;
        }else{
            return false;
        }

    }
#endregion


?>