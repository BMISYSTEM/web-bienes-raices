<?php
    require 'includes/funciones.php';
    $inicio = true;
    incluirtemplate('header',$inicio = false);
?>
    <main class="contenedor seccion">
        <h1>anuncios</h1>
        <div class="">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>casa de lujo en el lago </h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                         Placeat architecto in temporibus laboriosam ut quidem labore facilis soluta id quae ex vel et,
                    </p>
                  
                </div>
            </div>
        
        </div>
        </div>
        
    </main>
    <?php
    incluirtemplate('footer');
?>