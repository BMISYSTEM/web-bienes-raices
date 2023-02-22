<?php
    require 'includes/funciones.php';
    $inicio = true;
    incluirtemplate('header',$inicio = false);
?>
    <main class="contenedor seccion">
        <h1>contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.jpg" type="img/jpg">
            <img src="build/img/destacada3.jpg" alt="imagen titulo">
        </picture>
        <h2>Llene el formulario de contacto</h2>
        <form action="" class="formulario">
            <fieldset>
                <legend>Informacion personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">
                <label for="Email">Email</label>
                <input type="email" placeholder="Tu correo" id="Email">
                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono">
                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Digite su mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre propiedad</legend>
                <label for="opciones">vende o compra</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>--Seleccionar--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>
                <label for="presupuesto">Presupuesto</label>
                <input type="number" placeholder="Tu Presupuesto" id="presupuesto">
                
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="telefono-radio">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="telefono-radio">
                    <label for="correo-contacto">Email</label>
                    <input name="contacto" type="radio" value="Email" id="correo-contacto">
                </div>  
                <p>Si eligio telefono escoja la fecha y la hora</p>  
                <label for="fecha">Fecha</label>
                <input type="date" id="telefono">    
                <label for="hora">Hora</label>
                <input type="time"  id="telefono" min="09:00" max="15:00">       
            </fieldset>
            <input type="submit" value="Enviar" class="boton">
        </form>
    </main>
 
        <?php
    incluirtemplate('footer');
?>