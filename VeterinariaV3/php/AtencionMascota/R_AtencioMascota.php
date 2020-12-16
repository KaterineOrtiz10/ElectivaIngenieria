<?php
    date_default_timezone_set("America/Bogota");
    $servicio = $_POST['servicio'];
    $mascota = $_POST['mascota'];
    $fecha = $_POST['fecha'];
    $hora=$_POST['hora'];
    $min=$_POST['minutos'];
    $horaT=$hora.":".$min;
    $fechaAc= date("Y-m-d");
    require("../conexion.php");
//Vacios o no seleccionados
    if($servicio!=0 && $mascota!=0 && $fecha!=null && $hora!=0 && $min!=-1){
        //Fecha menor a la fecha actual
        if($fecha<$fechaAc){
            echo'<script type="text/javascript">
            alert("Fecha invalida");
            window.location.href="../AtencionMascota.php";
            </script>';
        }else{
            //No hay registros de ese servicio a esa hora y en esa fecha
            $sql="SELECT * FROM atencion_a_la_mascota WHERE Cod_Servicio='$servicio' AND Fecha='$fecha' AND hora='$horaT'";
            $resultado=$conexion->query($sql);
            $con=$resultado->num_rows;
            if($con>0){
                echo'<script type="text/javascript">
                alert("Este servicio ya esta reservado.");
                window.location.href="../AtencionMascota.php";
                </script>';
            }else{
                $saber="INSERT INTO atencion_a_la_mascota(`Cod_Servicio`, `Cod_Mascota`, `Fecha`, `hora`)  VALUES('$servicio', '$mascota', '$fecha','$horaT')";
                if($saberBD=$conexion->query($saber)){
                    echo'<script type="text/javascript">
                    alert("Se registró atención exitosamente.");
                    window.location.href="../AtencionMascota.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Error, no se registró atención.");
                    window.location.href="../AtencionMascota.php";
                    </script>';           
                }   
            }
        }
    }else{
        echo'<script type="text/javascript">
                alert("Campos invalidos");
                window.location.href="../AtencionMascota.php";
                </script>';
    }
   ?>
