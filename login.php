<?php 
 require 'includes/app.php';

$bd = conectardb();
$errores = [];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // echo "ingreso";
        $email = mysqli_real_escape_string($bd,filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)); 
        $pass = mysqli_real_escape_string($bd,$_POST['pass']);
        echo $email;
        if (!$email) {
            $errores[] = "No hay correo digitado";
        }
        if (!$pass) {
            $errores[] = "No hay | password digitado";
        }

        if (empty($errores)) {
            $query = "select * from usuarios where email = '${email}'";
            $resultado = mysqli_query($bd,$query);

            if ($resultado -> num_rows) {
                
            }else {
                $errores = "el usuario noexiste";
            }
        }


    }

 
 incluirtemplate('header');
?>

<main class="contenedor seccion">
    <h1>Iniciar Seccion</h1>
    <?php foreach($error as $errores):?>
        <div class="error">
            <?php echo $error;?>
        </div>
    <?php endforeach?>

    <form action="" class="formulario" method="POST">
            <fieldset>
                <legend>Email y Pasword</legend>
                <label for="Email">Email</label>
                <input type="email" placeholder="Tu correo" id="email" require>
                <label for="pass">Pasword</label>
                <input type="password" placeholder="Tu pasword" id="pass" require>
            </fieldset>
            <input type="submit" value="Iniciar seccion" class="boton-verde-block">
    </form>
</main>

<?php 

 incluirtemplate('footer');
 mysqli_close($db);
?>