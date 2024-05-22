<?php
    require_once('./includes/Login.class.php');
    if(isset($_POST['usuario']) && isset($_POST['clave'])){
        $login = new Login($_POST['usuario'], $_POST['clave']);
    } else {
        header('Location: index.php');
    }

?>