<?php
    //importar base de datos 
    $bd = conectardb();
    //realizar la consulta 
    $consulta = "select * from propiedades limit ${limite}";
    $resultado = mysqli_query($bd,$consulta);
    //optener la consulta 



?>
<div class="contenedor-anuncios">
<?php while($propiedades = mysqli_fetch_assoc($resultado)):?>
<div class="anuncio">
        <picture>
            
            <img loading="lazy" src="/imagenes/<?php  echo $propiedades['imagen'];?>" alt="anuncio">
        </picture>
        <div class="contenido-anuncio">
            <h3><?php echo $propiedades['Titulo'];?></h3>
            <p><?php echo $propiedades['descripcion'];?></p>
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
            <a href="anuncios1.php?id=<?php echo $propiedades['id'];?>" class="boton boton-amarillo"> Ver productos</a>
        </div>
    </div>
    <?php endwhile?>
</div>
<?php 
    mysqli_close($bd);
?>