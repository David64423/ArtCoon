<?php 

#region Verificar campos en la base de datos
function verificarRegistros($campo,$variable,$tabla,$conexion){

        $query = "select * from $tabla where $campo = '$variable'";
        $consulta = mysqli_query($conexion,$query);

        if(mysqli_affected_rows($conexion) > 0){
            return true;
        }else{
            return false;
        }

    }
#endregion


function selectTodo($tabla){
    return "select * from $tabla";
}

?>