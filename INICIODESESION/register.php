<?php

    require_once('./includes/Register.class.php');

    if(isset($_POST['usuario']) && isset($_POST['clave'])){
        $registro = new Register($_POST['usuario'], $_POST['clave']);
        $resultado = $registro->get_confirmation();
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Registro de usuario</title>
</head>
<body>
    <main>
        
        <hr>
        <form action="" method="POST" id="login-form">

        <?php
            if(isset($resultado)){
                echo $resultado;
            } else {
        ?>
            <div class="input-form">
                <label for="usuario">usuario:</label>
                <input type="usuario" name="usuario" id="usuario" placeholder="Escribe tu usuario"/>
            </div>
            <div class="input-form">
                <label for="clave">clave:</label>
                <input type="clave" name="clave" id="clave" placeholder="Introduce tu clave"/>
            </div>
                <button type="submit" form="login-form" value="Submit">Registrar</button>
                <?php
            }
        ?>
            <a href="index.php" class="go-back-button" >Volver</a>
        </form>
    </main>
</body>
</html>