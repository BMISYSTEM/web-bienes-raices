<?php

//importamos la conexion 
require 'includes/app.php';
$bd = conectardb();
//cxrear imail y psawor
$email = "correo@correo.com";
$pasword = "123456";
$paswordhas = password_hash($pasword,PASSWORD_BCRYPT);

//query para crear el usuario

$query = "insert into usuarios (email,pasword) values ('${email}','${paswordhas}')";
//agregar a la base de datos
mysqli_query($bd,$query);
