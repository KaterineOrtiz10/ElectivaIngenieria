<?php
    $servicio = $_POST['servicio'];
    $mascota = $_POST['mascota'];
    $fecha = $_POST['fecha'];

    if (!$servicio == "" && !$mascota == "") {
        require("../conexion.php");
            $saber="INSERT INTO atencion_a_la_mascota(`Cod_Servicio`, `Cod_Mascota`, `Fecha`)  VALUES('$servicio', '$mascota', '$fecha')";
            if($saberBD=$conexion->query($saber)){
                ?> 
                <script> window.alert("Se registro exitosamente")</script>
                <?php
                header("location: ../AtencionMascota.php"); 
            }else{
                ?> 
                <script> window.alert("Registro fallido")</script>                 
                <?php
                header("location:../AtencionMascota.php");             
            }   
    }
?>