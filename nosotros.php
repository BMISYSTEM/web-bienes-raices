<?php
    require 'includes/app.php';
    $inicio = true;
    incluirtemplate('header',$inicio = false);
?>
    <main class="contenedor seccion">
        <h1>nosotros</h1>
        <div class="seccion-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.jpg" type="img/jpg">
                    <img src="build/img/blog3.jpg" alt="imagen sala">
                </picture>
            </div>
            <div class="informacion">
                <h2>25 años de esperiencia</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id expedita animi
                     incidunt consectetur numquam. Vero odit, nam itaque hic, totam omnis nostrum
                 libero fuga porro praesentium quis dolorem? Tempora, dolore?</p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <h1>Contenido de seccion</h1>

        <div class="icono-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono de seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ab voluptatum, deserunt ducimus o</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono de seguridad" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ab voluptatum, deserunt ducimus o</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono de seguridad" loading="lazy">
                <h3>Estado</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ab voluptatum, deserunt ducimus o</p>
            </div>
        </div>
    </section>
<?php
    incluirtemplate('footer');
?>