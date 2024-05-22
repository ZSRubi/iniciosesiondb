<?php
session_start();    

   include('conexion.php');

if(isset($_POST['usuario'])&& isset($_POST['clave'])) {
    function validate ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $usuario = validate($_POST['usuario']);
    $clave = validate($_POST['clave']);

    if(empty($usuario)) {
        header("Location:Index.php?error=El usuario es Requerido");
    }elseif (empty($clave)) {
        header("location:Index.php?error=la clave es Requerida");
        exit();
    }else{

     
    
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
            $result = mysqli_query($conexion, $sql);

            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if($row['usuario'] ===$usuario && $row['clave'] ===$clave){
                    $_SESSION['usuario'] = $row['usuario'];
                    $_SESSION['Nombre_completo'] = $row['nombre_completo'];
                    $_SESSION['Id'] = $row['Id'];
                    header("Location:Inicio.php");
                    
                }else{
                header("Location:Index.php?error= El usuario o la clave son incorrectos");
                exit();
                }
        
            }else {
            header("Location:Index.php");
            exit();
            }
    }

}