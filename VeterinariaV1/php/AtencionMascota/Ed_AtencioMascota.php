<?php
$codigo= $_POST['codigo2'];
$servicio = $_POST['servicio'];
$mascota = $_POST['mascota'];
$fecha = $_POST['fecha'];

if (!$servicio == "" && !$mascota == "" && !$fecha == ""&& !$codigo == "") {
    require("../conexion.php");
        $query = "UPDATE atencion_a_la_mascota SET Cod_Servicio='$servicio', Cod_Mascota ='$mascota', Fecha='$fecha'
        WHERE Codigo='$codigo'";
        
        if ($resultado = $conexion->query($query)) {
            header("location: ../AtencionMascota.php"); 
        }else{
            echo "Error";
        }
}else{
    echo "Error 2";
}
?>