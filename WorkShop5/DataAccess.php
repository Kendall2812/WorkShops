<?php 

class DataAccess {
    function conexion(){

        $conx = mysqli_connect("localhost", "root", "", "estudiantes") or die ("Error al conectar a la base de datos. " . mysqli_error());
        if($conx){
            echo "Se conecto correctamente a la base de datos." . "\n";
            echo "\n";
        }
        
        return $conx; 
    }
}
?>