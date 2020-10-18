<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
$dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$cargo = (isset($_POST['cargo'])) ? $_POST['cargo'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$password2 = (isset($_POST['password2'])) ? $_POST['password2'] : '';
$fecha_ingreso = (isset($_POST['fecha_ingreso'])) ? $_POST['fecha_ingreso'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';


switch($opcion){
    case 1:
       
        $consulta = "INSERT INTO usuarios (nombres, apellidos, dpi, telefono, correo, direccion, cargo, usuario, password, password2, fecha_ingreso, estado) VALUES ('$nombres', '$apellidos', '$dpi', '$telefono', '$correo', '$direccion', '$cargo', '$usuario', '$password', '$password2', '$fecha_ingreso', '$estado') ";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM usuarios ORDER BY id_usuario DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', dpi='$dpi', telefono='$telefono',correo='$correo',direccion='$direccion',cargo='$cargo',usuario='$usuario',password='$password',password2='$password2',fecha_ingreso='$fecha_ingreso',estado='$estado' WHERE id_usuario='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM usuarios WHERE id_usuario='$user_id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM usuarios WHERE id_usuario='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM usuarios";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print($nombres);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
