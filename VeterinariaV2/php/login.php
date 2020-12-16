
<?php
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
    require("conexion.php");

    $sql="SELECT * FROM usuario WHERE Cedula='$usuario' AND Clave='$clave'";
    $login=$conexion->query($sql);
        if($fila=mysqli_fetch_array($login)){
            session_start();
            $_SESSION['nombre'] = $fila['Nombre'];
            $_SESSION['email'] = $fila['Correo_Electronico'];
            if($fila['Cargo']==1){                
                $_SESSION['rol'] = 1;
                echo'<script type="text/javascript">
                alert("Bienvenido '.$_SESSION['nombre'].'");
                window.location.href="inventario.php";
                </script>';
            }
            else if($fila['Cargo']==2){
                $_SESSION['rol'] = 2;
                echo'<script type="text/javascript">
                alert("Bienvenido '.$_SESSION['nombre'].'");
                window.location.href="Producto.php";
                </script>'; 
            }
        }else{
            echo'<script type="text/javascript">
            alert("Datos errados");
            window.location.href="../html/login.html";
            </script>';
        }
        
?>
