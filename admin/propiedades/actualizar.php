<?php
//recibir lo que se manda por url

$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);
//validacion de id valido
if(!$id){
    header('Location: /admin');
}
  
//bases de datos
    require '../../includes/configuraciones/database.php';
    $db = conectardb();


    //consulta para llenar los datos 
    $consulta_update = "SELECT * FROM PROPIEDADES WHERE ID = ${id}";
    $consulta_resultado = mysqli_query($db,$consulta_update);
    $propiedades = mysqli_fetch_assoc($consulta_resultado);
    // echo "<pre>";
    // var_dump($propiedades);
    // echo "</pre>";
    // creacion de la consulta para verificar usuarios

    $consulta = "select * from vendedores ";
    $resultado_consulta = mysqli_query($db,$consulta);



    //arreglo de errores

    $errores = [];
    $titulo = $propiedades['Titulo'];
    $precio = $propiedades['Precio'];
    $descripcion = $propiedades['descripcion'];
    $banos =$propiedades['wc'];
    $habitaciones = $propiedades['habitaciones'];
    $esta = $propiedades['estacionamiento'];
    $vendedoresid = $propiedades['vendedores_id'];
    $creado = date('y/m/d');
    $imagen = $propiedades['imagen'];

    //ejecuta la conexion y los insert
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";
        // exit;
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db,$_POST['precio']);
        $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
        $banos = mysqli_real_escape_string($db,$_POST['banos']);
        $habitaciones = mysqli_real_escape_string($db,$_POST['habitaciones']);
        $esta = mysqli_real_escape_string($db,$_POST['esta']);
        $vendedoresid = mysqli_real_escape_string($db,$_POST['vendedores']);
        $imagenes = $_FILES['imagenes'];

        if(!$titulo){
            $errores[] = "debes añadir un titulo";
        }
        if(!$precio){
            $errores[] = "debes añadir un precio";
        }
        if(!$banos){
            $errores[] = "debes añadir un numero de baños";
        }
        if(!$habitaciones){
            $errores[] = "debes añadir un numero de habitaciones";
        }
        if(!$esta){
            $errores[] = "debes añadir un numero de estacionamientos";
        }
        if(!$descripcion){
            $errores[] = "debes añadir una descripcion";
        }
        if(!$vendedoresid){
            $errores[] = "debes colocar un vendedor";
         
        }
        if(!$imagenes){
            $errores[] = "La imagen es obligatoria";
            
        }
        //insertar en la base de datos
        if(empty($errores) ){
               //creacion de carpeta 
               $carpeta = '../../imagenes/';
               if(!is_dir($carpeta)){
                   mkdir($carpeta);                
               }
            //consulta si hay una nueva imagen 
            if($imagenes['name']){
                //eliminar imagen del servidor
                // echo $propiedades['imagen'];
                // echo ($carpeta . $propiedades['imagen'] . "jpg");
                unlink($carpeta . $propiedades['imagen']);
                            // //genera un nonbre unico
                 $nombre_imagen = md5(uniqid(rand(),true));
                 // //asignar imagen en carpeta 
                 move_uploaded_file($imagenes['tmp_name'],$carpeta.$nombre_imagen);
            }else{
                $nombre_imagen = $propiedades['imagen'];
            }
            


            $querys = "UPDATE propiedades SET
                        id = '$id',
                         Titulo = '$titulo',
                          Precio = '$precio',
                           imagen = '$nombre_imagen',
                            descripcion = '$descripcion',
                             habitaciones = '$habitaciones',
                             estacionamiento = '$esta',
                             creado = '$creado',
                             vendedores_id = '$vendedoresid'
                             where id = '$id' ;";
            
            $resultado = mysqli_query($db,$querys);
            if($resultado){
                header('location: /admin?resultado=2');
            }
        }else{

        }
        
     
        // //echo $query;
        // if($resultado){
        //     // echo "Se inserto de manera correcta";
        // }

    }
    
    require '../../includes/funciones.php';
    incluirtemplate('header');


?> 

<main class="contenedor seccion">
    <h1>actualizar</h1>
    <a class='boton boton-inline' href="/admin/" >volver</a>
    <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error;?>
        </div>
    <?php endforeach?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>informacion general de la propiedad</legend>
            <label for="titulo">titulo</label>
            <input type="text" id="titulo" placeholder="propiedad" name="titulo" value="<?php echo $titulo;?>">
            <label for="precio">Precio</label>
            <input type="number" id="precio" placeholder="precio propiedad" name="precio" value="<?php echo $precio;?>">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg , image/png" name="imagenes">
            <img src="../../imagenes/<?php echo $imagen ?>" alt="" class="imagen-update">
            <label for="descripcion">descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"  name="descripcion" ><?php echo $descripcion;?></textarea>
        </fieldset>
        <fieldset>
            <legend>informacion de la propiedad</legend>
            <label for="habitacione">habitaciones</label>
            <input type="number" id="habitaciones" placeholder="Ej:3" min = "1" max="9" name="habitaciones" value="<?php echo $habitaciones;?>">
            <label for="banos">baños</label>
            <input type="number" id="banos" placeholder="Ej:3" min = "1" max="9" name="banos" value="<?php echo $banos;?>">
            <label for="esta">estacionamiento</label>
            <input type="number" id="esta" placeholder="Ej:3" min = "1" max="9" name="esta" value="<?php echo $esta;?>">
        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedores">
                <option value="">Seleccione</option>
                <?php while($vendedor = mysqli_fetch_assoc($resultado_consulta)):?>

                    <option  <?php echo  $vendedoresid === $vendedor['id'] ? 'selected' : '';?> 
                                value="<?php echo $vendedor['id'];?>">
                                    <?php echo $vendedor['nombre']." ". ['apellido'];?>
                    </option>


                <?php endwhile?>
 
            </select>
        </fieldset>

        <input type="submit" class="boton-inline" value="Registrar">
    </form>
</main>

<?php
    incluirtemplate('footer');
?>  