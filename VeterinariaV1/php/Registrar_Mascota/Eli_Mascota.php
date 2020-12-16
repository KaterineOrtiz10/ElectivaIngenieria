<?php
    $id=$_REQUEST['id'];
    require("../conexion.php");
    $saber="DELETE FROM mascota WHERE Codigo='$id'";
    $saberBD=$conexion->query($saber);
   if($saberBD){
  
        header("location: ../Mascota.php"); 
    }else{
    
        header("location: ../Mascota.php"); 
    }
?>