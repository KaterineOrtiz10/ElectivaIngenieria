<?php
   $codigo = $_POST['codigo2'];
   $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
   $nombre = $_POST['nombreP'];
   $descripcion = $_POST['descripcion'];
   $especie = $_POST['cboEspecie'];
   $categoria = $_POST['cboCategoria'];
   $cantidad = $_POST['cantidad'];
   $precio_compra = $_POST['precio_compra'];
   $precio_venta = $_POST['precio_venta'];

  if ($codigo!= "" &&  $imagen !== false && $nombre != "" && $descripcion != "" && $especie != "" && $categoria != "" && $cantidad != "" && $precio_compra != "" && $precio_venta != "") {
        require("../conexion.php");
        $query = "UPDATE producto SET Imagen= '$imagen', Nombre_Producto='$nombre', Descripcion='$descripcion',Especie='$especie',Categoria='$categoria',Cantidad='$cantidad',Precio_Compra='$precio_compra',Precio_Venta='$precio_venta'
        WHERE Codigo='$codigo'";

        if($saberBD=$conexion->query($query)){           
            header("location: ../Producto.php"); 
        }else{            
            header("location:../Producto.php");             
        }  
    }
?>