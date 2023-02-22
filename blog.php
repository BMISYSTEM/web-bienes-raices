<?php
    require 'includes/app.php';
    $inicio = true;
    incluirtemplate('header',$inicio = false);
?>
    <main class="contenedor seccion">
        <h1>Nuestro blog</h1>
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
    </main>
    <?php
    incluirtemplate('footer');
?>