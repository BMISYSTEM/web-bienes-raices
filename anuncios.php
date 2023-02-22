<?php
    require 'includes/app.php';
    $inicio = true;
    incluirtemplate('header',$inicio = false);
?>
    <main class="contenedor seccion">
        <h1>anuncios</h1>
        <div class="contenedor-anuncios">
            <?php 
                $limite = 10;
                include 'includes/template/anuncios.php';
            ?>
        </div>
        
    </main>
    <?php
    incluirtemplate('footer');
    mysqli_close($bd);

?>