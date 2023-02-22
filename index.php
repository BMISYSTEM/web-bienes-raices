<?php
    require 'includes/app.php';
    $inicio = true;
    incluirtemplate('header',$inicio = true);
?>
    <main class="contenedor seccion">
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
    </main>
    <section class="seccion contenedor">
        <h2>Casas en venta</h2>
        <?php 
            $limite = 3;
            include 'includes/template/anuncios.php';
        ?>
        <div class="boton vertodas">
            <a href="anuncios.php">Ver todas</a>
        </div>
    </section>
    <section class="imagen-contacto imagen-pocicion">
        <h2>Encunetra la casa de tus sueños</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, officia! Dolor aliquam praesentium voluptates </p>
        <a href="contacto.html"class="boton-inline">Contacto</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.jpg" type="imagen/jpg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="imagen jpg">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>20/28/2023</span> por: <span>Admin</span></p>
                        <p>
                            consejos para constrir la terraza 
                        </p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.jpg" type="imagen/jpg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="imagen jpg">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Decoracion de tu hogar</h4>
                        <p>Escrito el: <span>20/28/2023</span> por: <span>Admin</span></p>
                        <p>
                            consejos para constrir la terraza 
                        </p>
                    </a>
                </div>
            </article>
        </section>
        <section class="textimoniales">
            <h3>textimonios</h3>
            <div class="textimonial">
                <blockquote>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Od
                    it doloremque debitis accusamus, optio id doloribus ea commodi quam cum corporis?
                     Quas laborum magni qui quasi porro, sunt voluptatum perferendis. Repudiandae!
                </blockquote>
                <p>-bayron meneses</p>
            </div>
        </section>
    </div>
<?php
    incluirtemplate('footer');

    mysqli_close($bd);

?>