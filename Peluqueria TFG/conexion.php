<?php 

$localhost = 'localhost';
$bd = 'usuarios';
$user = 'root';
$pass = 'root';

//Tablas de nuestra base de datos

$tb1 = 'users';
$tb2 = 'citas';


//Ejecutamos la conexion
$con = mysqli_connect($localhost,$user,$pass,$bd);


// Comprobar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}
 ?>