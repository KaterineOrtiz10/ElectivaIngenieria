<?php
 $codigo = $_POST['codigo2'];
 $nombrem = $_POST['Nombre'];
 $especie = $_POST['cboEspecie'];
 $edad = $_POST['Edad_Mascota'];
 $sexo = $_POST['cboSexo'];
 $nombred = $_POST['Nombre_duenio'];
 $telefono = $_POST['Telefono'];

 if (!$codigo == "" && !$nombrem == "" && !$especie== 0 && !$edad == "" && !$sexo == 0 && !$nombred == "" && !$telefono == "") {
    require("../conexion.php");
    $query="UPDATE mascota SET
    NombreMascota ='$nombrem', Especie='$especie', Edad='$edad', Sexo='$sexo', NombreDuenio='$nombred', Telefono='$telefono' 
    WHERE Codigo='$codigo'";
    if ($resultado = $conexion->query($query)) {
        header("location: ../Mascota.php"); 
    }else{
        echo "Error";
    }
}else{
    echo "Error 2";
}

?>