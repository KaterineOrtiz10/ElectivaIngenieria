<?php
    $codigo = $_POST['id'];
    $nombrem = $_POST['Nombre'];
    $especie = $_POST['cboEspecie'];
    $edad = $_POST['Edad_Mascota'];
    $sexo = $_POST['cboSexo'];
    $nombred = $_POST['Nombre_duenio'];
    $telefono = $_POST['Telefono'];
    require("../conexion.php");
    // 
//Vacios o no seleccionados y negativos
    if ($codigo != null && $nombrem != null && $especie != -1 && $edad >0 && $sexo != -1 && $nombred != null && $telefono > 0) {
        $sql="SELECT * FROM mascota WHERE Codigo='$codigo'";
        $resultado=$conexion->query($sql);
        $con=$resultado->num_rows;
        //No exista ya el codigo
            if($con>1){
                echo'<script type="text/javascript">
                alert("Ya existe este código.");
                window.location.href="../Mascota.php";
                </script>';
            }else{
                $saber="UPDATE mascota SET NombreMascota ='$nombrem', Especie='$especie', Edad='$edad', Sexo='$sexo', NombreDuenio='$nombred', Telefono='$telefono' WHERE Codigo='$codigo'";
                if($saberBD=$conexion->query($saber)){
                    echo'<script type="text/javascript">
                    alert("Se actualizó mascota exitosamente.");
                    window.location.href="../Mascota.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Error, no se actualizo mascota.");
                    window.location.href="../Mascota.php";
                    </script>';           
                }  
            }
          
    }else{
        echo'<script type="text/javascript">
        alert("Campos invalidos");
        window.location.href="../Mascota.php";
        </script>';
    }
?>