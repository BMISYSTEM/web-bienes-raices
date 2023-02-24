<?php
//bases de datos
    require '../../includes/app.php';
    use app\propiedad;
    $db = conectardb();

    // creacion de la consulta para verificar usuarios

    $consulta = "select * from vendedores ";
    $resultado_consulta = mysqli_query($db,$consulta);



    //arreglo de errores

    $errores = [];
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $banos ='';
    $habitaciones = '';
    $esta = '';
    $vendedoresid = '';
    $creado = date('y/m/d');

    //ejecuta la conexion y los insert
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //instanciamos el objecto propiedad
        $propiedad = new propiedad($_POST);
        //objecto de errores
        $errores = $propiedad->validar();
        //insertar en la base de datos
        if(empty($errores) ){
            //objecto de guardado 
            $propiedad ->guardar();
            //creacion de carpeta
            $carpeta = '../../imagenes/';
            if(!is_dir($carpeta)){
                mkdir($carpeta);                
            }
            //genera un nonbre unico
            $nombre_imagen = md5(uniqid(rand(),true));
            //asignar imagen en carpeta 
            move_uploaded_file($imagenes['tmp_name'],$carpeta.$nombre_imagen);

            $querys = "INSERT INTO PROPIEDADES (Titulo,Precio,descripcion,habitaciones,wc,estacionamiento,vendedores_id,creado,imagen) values"."('$titulo','$precio','$descripcion','$banos','$habitaciones','$esta','$vendedoresid','$creado','$nombre_imagen');";
            $resultado = mysqli_query($db,$querys);
            if($resultado){
                header('location: /admin?resultado=1');
            }
        }else{
        }
        // //echo $query;
        // if($resultado){
        //     // echo "Se inserto de manera correcta";
        // }
    }
    incluirtemplate('header');
?> 
<main class="contenedor seccion">
    <h1>Crear</h1>
    <a class='boton boton-inline' href="/admin/" >volver</a>
    <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error;?>
        </div>
    <?php endforeach?>
    <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>informacion general de la propiedad</legend>
            <label for="titulo">titulo</label>
            <input type="text" id="titulo" placeholder="propiedad" name="titulo" value="<?php echo $titulo;?>">
            <label for="precio">Precio</label>
            <input type="number" id="precio" placeholder="precio propiedad" name="precio" value="<?php echo $precio;?>">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg , image/png" name="imagenes">

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
            <select name="vendedoresid">
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