<?php
    //importar conexion
    require '../includes/configuraciones/database.php';
    $db = conectardb();
    //crear query
    $consulta = "select * from propiedades";
    //crear query
    $resultadoconsulta = mysqli_query($db,$consulta);
//mensaje condiccional
    $resultado = $_GET['resultado'] ?? null;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id,FILTER_VALIDATE_INT);

        if ($id) {
            //eliminar imagen 
            $buscar_imagen = "SELECT imagen FROM propiedades where id = '$id' ;";
            $resultado_imagen = mysqli_query($db,$buscar_imagen);
            $imagen_propiedades = mysqli_fetch_assoc($resultado_imagen);
            unlink('../imagenes/'. $imagen_propiedades['imagen']);

            //eliminar propiedad
            $delete = "DELETE FROM propiedades WHERE id = '$id';";
            $resultado_delete = mysqli_query($db,$delete);     
            if ($resultado_delete) {
                header('Location: /admin');
            }
        }
       
       

    }
    require '../includes/funciones.php';
    incluirtemplate('header');
?>   
<main class="contenedor seccion">
    <h1>administrador</h1>
    <?php if( intval($resultado) === 1):?> 
        <p class="">se registro de forma correcta</p>
    <?php  elseif(intval($resultado) === 2): ?>   
        <p class="">se actualizo la propiedad de forma correcta</p>
    <?php  endif; ?>   
    <a class='boton boton-inline' href="/admin/propiedades/crear.php" >Nueva propiedad</a>

    <table class="propiedades">
        <thead>
            <th>Id</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php while($propiedades = mysqli_fetch_assoc($resultadoconsulta)):?>
                <tr>
                    <td><?php echo $propiedades['id'];?></td>
                    <td><?php echo $propiedades['Titulo'];?></td>
                    <td><img src="/imagenes/<?php echo $propiedades['imagen'];?>" alt="imagen"class= "imagen tabla"></td>
                    <td>$<?php echo $propiedades['Precio'];?></td>  
                    <td>
                        <form method="POST" class="W-100">
                            <input type="hidden" name="id" value = "<?php echo $propiedades['id'];?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedades['id'];?>" class="boton-verde-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</main>

<?php
    //cerrar conexion
    mysqli_close($db);            
    incluirtemplate('footer');
?>  