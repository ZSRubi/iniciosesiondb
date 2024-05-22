<?php

    $host ="localhost:3306";
    $user ="root";
    $pass="";

    $db="iniciosesiondb";

    $conexion = mysqli_connect( $host, $user, $pass,$db);

    if (!$con) {
        echo "conexion fallida";
    }


