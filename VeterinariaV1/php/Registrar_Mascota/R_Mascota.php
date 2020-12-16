<?php
    $codigo = $_POST['Codigo'];
    $nombrem = $_POST['Nombre'];
    $especie = $_POST['cboEspecie'];
    $edad = $_POST['Edad_Mascota'];
    $sexo = $_POST['cboSexo'];
    $nombred = $_POST['Nombre_duenio'];
    $telefono = $_POST['Telefono'];

    if (!$codigo == "" && !$nombrem == "" && !$especie== 0 && !$edad == "" && !$sexo == 0 && !$nombred == "" && !$telefono == "") {
        require("../conexion.php");
            $saber="INSERT INTO mascota(`Codigo`, `NombreMascota`, `Especie`,`Edad`,`Sexo`,`NombreDuenio`,`Telefono`)  VALUES('$codigo', '$nombrem', '$especie','$edad','$sexo', '$nombred','$telefono')";
            if($saberBD=$conexion->query($saber)){
                ?> 
                <script> window.alert("Se registro exitosamente")</script>
                <?php
                header("location: ../Mascota.php"); 
            }else{
                ?> 
                <script> window.alert("Registro fallido")</script>                 
                <?php
                header("location: ../Mascota.php");             
            }   
    }
?>