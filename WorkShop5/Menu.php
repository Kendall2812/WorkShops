<?php
require 'Student.php';

echo "\n";
echo "Menu del Crud." . "\n";
echo "\n";
echo "Digitar un numero para realizar una accion: " . "\n";
echo  "\n";
echo "1) Para insertar estudiante." . "\n";
echo "2) Para ver infomacion del estudiante. ( Se recomienda para poder modificar o eliminar estudiantes )" . "\n";
echo "3) Para modificar estudiante." . "\n";
echo "4) Para eliminar estudiante." . "\n";
echo  "\n";

$accion = $argv[1];

if($accion == 1){ //esta accion es para insertar estudiantes a la base de datos.
    if($argc == 6){
        $student = new Student($argv[2], $argv[3], $argv[4], $argv[5]);
        if($student->insert() == true){
            echo "se insero la informacion bien";
        }
        else{
            echo "Error no se pudo insertar el estudiante."; 
        }      
    }else{
        echo "Debe introducir la informacion de esta manera ver el ejemplo" . "\n";
        echo "La accion que en este caso es 1 Cedula Nombre Apellidos entre comillas Correo" . "\n";
        echo "1 208560267 Ronald Paniagua Guzman Ronalpg@gmail.com" . "\n";
        echo  "\n";
    }
}
elseif($accion == 2){ //esta accion es para hacer lectura de tabla que contiene registrados a los estudiantes.
    $student3 = new Student("null", "null", "null", "null"); // llama a la funcion de readData en Student para extraer la infomacion de los estudiantes.
    $student3->readData();
}

elseif($accion == 3){ // esta accion es para modificar la informacion de los estudiantes.
    echo "Cedula, Nombre, Apellido, Correo de estudiante para Modificar:" . "\n";
    echo "Porfavor ingresar los nuevos valores y los que no va cambiar se recomienda que coloque los mismos valores que tenia.";
    //echo "Solo se puede modificaar el nombre, apellidos y correo";
    echo "\n";
    if($argc == 6){
        $student3 = new Student($argv[2], $argv[3], $argv[4], $argv[5]);
        if($student3->update()){
            echo "Se modifico de manera exitosa el estudiante.";
        }
        else{
            echo "No se pudo modificar el estudiante.";
        }
    }
    else{
        echo "Para Modificar solo se tiene que digitar el tres y" . "\n";
        echo "\n";
        echo "Solo se puede modificaar el nombre, apellidos y correo" .  "\n";
        echo "\n";
    }
}

elseif($accion == 4){ // esta accion es para eliminar estudiantes. ( Solo se requiere la cedula ).
    echo "Cedula de estudiante para eliminar." . "\n";
    echo "\n";
    if($argc == 3){
        $student3 = new Student($argv[2], "null", "null", "null");
        if($student3->delete()){
            echo "Se elimino de manera exitosa el estudiante.";
        }
        else{
            echo "No se pudo eliminar el estudiante.";
        }
    }
    else{
        echo "Para eliminar solo se tiene que digitar el cuatro." . "\n" .
        "y la cedula del estudiante que desea eliminar.";
    }

}
else{
    echo "No seleciono ninguna acción.";
}

?>