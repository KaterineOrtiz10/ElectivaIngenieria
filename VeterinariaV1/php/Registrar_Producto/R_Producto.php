<?php
    $codigo = $_POST['codigo'];
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

            $saber="INSERT INTO producto(`Codigo`, `Imagen`, `Nombre_Producto`, `Descripcion`,`Especie`,`Categoria`,`Cantidad`,`Precio_Compra`,`Precio_Venta`)  
            VALUES('$codigo', '$imagen', '$nombre','$descripcion','$especie','$categoria','$cantidad','$precio_compra','$precio_venta')";
            if($saberBD=$conexion->query($saber)){
                ?> 
                <script> window.alert("Se registro exitosamente")</script>
                <?php
                header("location: ../Producto.php"); 
            }else{
                ?> 
                <script> window.alert("Registro fallido")</script>                 
                <?php
                header("location:../Producto.php");             
            }   
    }
?>