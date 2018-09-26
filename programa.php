<?php

$db_host = "localhost";
$db_nombredb = "geonnypizza";
$db_usuario = "root";
$db_contra = "";
$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombredb);
$cc = ($_POST["cc"]);
$nombre = ($_POST["nombre"]);
$apellido=($_POST["apellido"]);
$correo = $_POST["correo"];
$contraseña = $_POST["contra"];
$barrio = $_POST["barrio"];
$direccion = $_POST["direc"];
$tipoTelef = $_POST["tipo"];
$telefo = $_POST["tel"];
if ($cc) {
    echo $cc;
    echo $nombre;
    echo $apellido;
    echo $contraseña;
    echo $barrio;
    echo $direccion;
    echo $tipoTelef;
    echo $telefo;
    
}

/*
  require ("conexion.php");
  $conexion= mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombredb);
  $cc=$_POST["cc"];
  $nombre=$_POST["nombre"];
  $apellido=$_POST["apellido"];
  $correo=$_POST["correo"];
  $contraseña=$_POST["contra"];
  $barrio=$_POST["barrio"];
  $direccion=$_POST["direc"];
  $tipoTelef=$_POST["tipo"];
  $telefo=$_POST["tel"];

  $consulta="INSERT INTO clientes(id_usuario,nombre,apellido,correo,contraseña)"
  . " VALUE ('$cc','$nombre','$apellido','$correo','$contraseña')";
  $consulta2="INSERT INTO ubicacion(barrio,direccion) VALUE('$barrio','$direccion')";
  echo $tipoTelef;
 * 
 */
?>