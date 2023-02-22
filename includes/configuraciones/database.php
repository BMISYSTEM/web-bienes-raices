<?php

function conectardb() : mysqli{
    $db = NEW mysqli('localhost','root','Atenea.99','bienesraices_crud');

    if(!$db){
        echo "error de conexion";
        exit;
    }

    return $db;
}

//PDO-----------------------------------------------------------------------------------
// $db = new PDO('mysql:host=localhost;dbname=bienesraices_crud','root','Atenea.99');
//QUERY---------------------------------------------------------------------------------
// $query = "select titulo from propiedades";
// //PREPARA LA CONSULTA-------------------------------------------------------------------
// $stmt = $db->prepare($query);
// $stmt->execute();
// //traer todo en un array----------------------------------------------------------------
// $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
// //RECORRER LOS RESULTADOS---------------------------------------------------------------
// foreach($resultado as $rows){
//     echo $rows['titulo'];
// }

