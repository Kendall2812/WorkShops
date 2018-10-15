<?php

require 'DataAccess.php';

class Student 
{
public $cedula;
public $name;
public $apellido;
public $correo;
public $verifi;

function Student($cedula, $name, $apellido, $correo){
    $this->cedula = $cedula;
    $this->name = $name;
    $this->apellido = $apellido;
    $this->correo = $correo;
}

function insert(){ //esta funcion inserta a los nuevos estudiantes la conexion de la base de datos la optiene atravez de la variable $conectar.
    
    $conectar = new DataAccess();
    $conexion1 = $conectar->conexion();
    $verifi = mysqli_query($conexion1, "INSERT INTO datosEstudiante (cedula, nombre, apellido, correo) VALUES ('$this->cedula', '$this->name', '$this->apellido', '$this->correo');");
    if($verifi){
        echo "Se inserto de manera exitosa el estudiante." . "\n";
        mysqli_close($conexion1);
        exit();
    }
    else{
        echo "Error no se pudo registrar el estudiante." . "\n";
        exit();
    }
}

function readData(){ //esta funcion sirve para leer la informacion de los estudiantes y la conexion de la base de datos la optiene atravez de la variable $conectar.
    $conectar2 = new DataAccess();
    $conexion2 = $conectar2->conexion();
    $verifi = mysqli_query($conexion2,"SELECT * FROM datosestudiante;");
    if($verifi){
        while($fila = mysqli_fetch_array($verifi)){
            echo $fila['cedula'] . " " . $fila['nombre'] . " " . $fila['apellido'] . " " . $fila['correo'] . "\n";
        }
        echo "\n";
        mysqli_close($conexion2);
        exit();
    }
    else{
        echo "Error no se pudo eliminar el estudiante selecionado." . "\n";
        exit();
    }
    
}

function update(){ //esta funcion modifica la informacion del los estudiantes y la conexion de la base de datos la optiene atravez de la variable $conectar.
    $conectar3 = new DataAccess();
    $conexion3 = $conectar3->conexion();
    $verifi = mysqli_query($conexion3,"UPDATE `datosestudiante` SET nombre='$this->name', apellido='$this->apellido', correo='$this->correo' WHERE cedula = '$this->cedula';");
    if($verifi){
        echo "Se modifico el estudiante de manera exitosa.";
        mysqli_close($conexion3);
        exit();
    }
    else{
        echo "Error no se pudo modificar el estudiante selecionado." . "\n";
        exit();
    }
}

function delete(){ //esta funcion elimina a los estudiantes y la conexion de la base de datos la optiene atravez de la variable $conectar.
    $conectar4 = new DataAccess();
    $conexion4 = $conectar4->conexion();
    $verifi = mysqli_query($conexion4,"DELETE FROM `datosestudiante` WHERE cedula = '$this->cedula';");
    if($verifi){
        echo "Se elimino el estudiante de manera exitosa.";
        mysqli_close($conexion4);
        exit();
    }
    else{
        echo "Error no se pudo eliminar el estudiante selecionado." . "\n";
        exit();
    }
}

}

?>