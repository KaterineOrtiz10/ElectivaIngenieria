<?php
    $id=$_REQUEST['id'];
    require("../conexion.php");
    $saber="DELETE FROM producto WHERE Codigo='$id'";
    $saberBD=$conexion->query($saber);
   if($saberBD){
    echo "<script> alert('Registro eliminado');</script>";
    header("location: ../Producto.php"); 
   }else{
    echo "<script> alert('El registro no fue eliminado');</script>";
    header("location: ../Producto.php"); 
   }
?>