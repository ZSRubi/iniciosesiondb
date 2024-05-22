<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Inicio de sesion</title>

</head>
<body>
    <form action="IniciarSesion.php" method = "POST">
        <h1>INICIAR SESION</h1>
        <hr>
        <?php
            if(isset($_GET['error'])){
             ?>
             <p class="error">
                 <?php
                    echo $_GET['error'];
                ?>


             </p>
        <?php
            } 
         
        ?>
        <hr>
        <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <input type="text" name="usuario" placeholder="nombre de usuario">
        
        <i class="fa-solid fa-unlock"></i>
        <label>clave</label>
        <input type="text" name="clave" placeholder="clave">
        <hr>
        <button type="submit">INICIAR SESION </button> 
        <a href="register.php">Crear cuenta</a>
    </form>
    
</body>
</html>