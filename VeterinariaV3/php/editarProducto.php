<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro productos</title>
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
                <li><a href="inventario.php">INVENTARIO</a></li>
                <li><a href="Mascota.php">REGISTRO MASCOTAS</a></li>
                <li><a href="#">REGISTRO PRODUCTOS</a></li>
                <li><a href="AtencionMascota.php">ATENCION A LA MASCOTA</a></li>
                <li><a href="logOut.php">Cerrar sesion</a></li>
            </ul>
        </nav>
    </header>
    <?php
    include("conexion.php");
    $especie =array("Perro", "Gato");
    $did=$_REQUEST['id'];
?>
    <div id="regis">
        <div class="Contene-inputs">
            <h3>Editar registro de atención mascota</h3>
            <!--From modal-->
            <form action="Registrar_Producto/Ed_Producto.php" method="POST" enctype='multipart/form-data'>
                <div class="ModalCuerpo">
                <input type="hidden" name="id" value="<?php echo $did?>">
                    <label for="Imagen">Imagen</label>
                    <?php
                            require("conexion.php");
                            $consulta = "SELECT Imagen FROM producto WHERE Codigo='$did'";
                            $resultado = $conexion->query($consulta);   
                            $fila = $resultado->fetch_assoc();                         
                                                                         
                echo '<img style="width:80px" src="data:image/jpeg;base64,'.base64_encode($fila["Imagen"]).'"/>';                
                ?>
                    <input type="file" name="imagen" ">
                    <br>
                    <label for=" Nombre Producto">Nombre Producto</label>
                    <?php
                        require("conexion.php");
                        $consulta = "SELECT Nombre_Producto FROM producto WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                    <input type="text" name="nombreP" value="<?php echo $fila['Nombre_Producto']; ?>">
                    <br>
                    <label for="Descripcion">Descripcion</label>
                    <?php
                        require("conexion.php");
                        $consulta = "SELECT Descripcion FROM producto WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                    <textarea name="descripcion" style="width:100%;"><?php echo $fila['Descripcion']; ?></textarea>
                    <br>
                    <div>
                        <label for="Especie">Especie</label>
                        <select name="cboEspecie" style="width:100%;">
                            <option value="0">Seleccionar</option>
                            <?php
                            require("conexion.php");
                            $consulta = "SELECT Especie FROM producto WHERE Codigo='$did' ";
                            $resultado = $conexion->query($consulta);
                            $fila = $resultado->fetch_assoc();
                            foreach($especie as $pos=>$esp){
                                if($fila['Especie']==$esp){
                                    ?>
                            <option selected="true" value="<?php echo $esp?>"><?php echo $esp?></option>
                            <?php
                                }else{
                                    ?>
                            <option value="<?php echo $esp?>"><?php echo $esp?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="Categoria">Categoria</label>
                        <select name="cboCategoria" style="width:100%;">
                            <option value="0">Seleccione categoria</option>
                            <?php
                                require("conexion.php");
                                $consulta = "SELECT cp.Nombre_Categoria, p.Categoria, cp.CodigoC  FROM producto p, categoria_producto cp WHERE p.Codigo='$did'";
                                
                                $resultado = $conexion->query($consulta);
                                while ($fila = $resultado->fetch_assoc()) {
                                    if($fila['Categoria']==$fila['CodigoC']){
                                        ?>
                            <option selected="true" value="<?php echo $fila['Categoria']; ?>">
                                <?php echo $fila['Nombre_Categoria']; ?></option>
                            <?php
                                    }else{
                            ?>
                            <option value="<?php echo $fila['Categoria']; ?>"><?php echo $fila['Nombre_Categoria']; ?>
                            </option>
                            <?php
                        }
                                }
                            ?>
                        </select>
                    </div>
                    <br>
                    <label for="Cantidad">Cantidad</label>
                    <?php
                        require("conexion.php");
                        $consulta = "SELECT Cantidad FROM producto WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                    <input type="text" name="cantidad" value="<?php echo $fila['Cantidad']; ?>">
                    <br>
                    <label for="Precio compra">Precio compra</label>
                    <?php
                        require("conexion.php");
                        $consulta = "SELECT Precio_Compra FROM producto WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                    <input type="text" name="precio_compra" value="<?php echo $fila['Precio_Compra']; ?>">
                    <br>
                    <label for="Precio venta">Precio venta</label>
                    <?php
                        require("conexion.php");
                        $consulta = "SELECT Precio_Venta FROM producto WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                    <input type="text" name="precio_venta" value="<?php echo $fila['Precio_Venta']; ?>">
                </div>
                <div class="modalFooter">
                    <button type="submit" id="guardar" class="btn btn-primary">Guardar cambios</button>
                    <button> <a href="Producto.php" title="Regresar">Regresar</a></button>
                </div>
            </form>
            <!--Fin form modal-->
        </div>
    </div>
    <!--Fin modal-->
    <footer>
        <p>
            AMAMOS A TUS MASCOTAS
        </p>
    </footer>
</body>

</html>