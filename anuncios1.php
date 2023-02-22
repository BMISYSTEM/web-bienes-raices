<?php
    //conexion a base de datos
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: /index.php');
    }
    require 'includes/app.php';
    $db = conectardb();
    //consulta a la base de datos 
    $consulta = "select * from propiedades where id = ${id}";
    $resultado = mysqli_query($db,$consulta);
    $propiedades = mysqli_fetch_assoc($resultado);
    $inicio = true;
    incluirtemplate('header',$inicio = false);
?>
    <main class="contenedor seccion">
        <h1>Productos</h1>
        <div class="">
            <div class="anuncio">
                <picture>
                    <img loading="lazy" src="imagenes/<?php echo $propiedades['imagen'];?>" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedades['Titulo'];?></h3>
                    <p class="precio">
                        <?php echo $propiedades['Precio'];?>
                    </p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedades['wc'];?></p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono wc">
                            <p><?php echo $propiedades['estacionamiento'];?></p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono wc">
                            <p><?php echo $propiedades['habitaciones'];?></p>

                        </li>
                    </ul>
                    <p><?php echo $propiedades['descripcion'];?></p>
                    <a href="index.php" class="boton boton-amarillo"> Volver</a>
                </div>
            </div>
        
        </div>
        </div>
        
    </main>
    <?php
    incluirtemplate('footer');

    mysqli_close($bd);

?>