<?php
    $conexion = new mysqli("localhost","root", "", "veterinaria");
    if (mysqli_connect_errno($conexion)) {
        echo "fallo al conectar a la base de datos  " .mysqli_connect_error();
        
    }
?>