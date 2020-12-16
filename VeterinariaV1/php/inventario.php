<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <link rel="icon" href="../IMAGENES/icon1.png">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="logo_main">
        <a href="../index.html">
            <img src="../IMAGENES/img3.png" alt="Logo" width="550px" height="170px">
        </a>
    </div>
    <header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"> <img src="../IMAGENES/men.png" alt="Error al cargar la imagen" width="40" height="40">
        </label>
        <nav class="menu" id="menu">
            <ul>
                <li><a href="#">INVENTARIO</a></li>
                <li><a href="Mascota.php">REGISTRO MASCOTAS</a></li>
                <li><a href="Producto.php">REGISTRO PRODUCTOS</a></li>
                <li><a href="AtencionMascota.php">ATENCION A LA MASCOTA</a></li>
                <li><a href="logOut.php">CERRAR SESION</a></li>

            </ul>
        </nav>
    </header>
<!--Tabla de productos-->
  <div id="table">
        <table class="table">
            <tr>
                <th>Código</th>
                <th >Imagen</th>
                <th>Nombre</th>
                <th style="width:380px">Descripción</th>
                <th>Especie</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>   
            </tr>
            <?php                                   
                require("conexion.php");
                $consulta = "SELECT * FROM producto p, categoria_producto cp WHERE p.Categoria= cp.CodigoC";
                $resultado = $conexion->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {
            ?>
            <tr>
                <td> <?php echo $fila['Codigo']; ?></td>
                <td>  <?php echo '<img style="width:180px" src="data:image/jpeg;base64,'.base64_encode($fila["Imagen"]).'"/>';?></td>
                <td> <?php echo $fila['Nombre_Producto']; ?></td>
                <td> <?php echo $fila['Descripcion']; ?></td>
                <td> <?php echo $fila['Especie']; ?></td>
                <td> <?php echo $fila['Nombre_Categoria']; ?></td>
                <td> <?php echo $fila['Cantidad']; ?></td>
                <td> <?php echo $fila['Precio_Compra']; ?></td>
                <td> <?php echo $fila['Precio_Venta']; ?></td>
            </tr>
            <?php
                }
         ?>
        </table>
    </div>
<!--Fin tabla de productos-->
</body>
</html>