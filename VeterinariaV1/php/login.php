<?php
    session_start();
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
    require("conexion.php");

    $sql="SELECT Cargo FROM usuario WHERE Cedula='$usuario' AND Clave='$clave'";
    $login=$conexion->query($sql);
        if($fila=mysqli_fetch_array($login)){
            if($fila['Cargo']==1){
            // echo "administrador";
            header("location: inventario.php");   
            }
            else if($fila['Cargo']==2){
                header("location: Producto.php");   
            }
        }else{
            // echo "no hay resultados";
            header("location: ../html/login.html");
        }
?>