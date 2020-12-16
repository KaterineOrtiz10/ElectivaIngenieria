<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar mascota</title>
    <link rel="icon" href="../IMAGENES/icon1.png">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/editar.js"></script>
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
                <li><a href="#">REGISTRO MASCOTAS</a></li>
                <li><a href="Producto.php">REGISTRO PRODUCTOS</a></li>
                <li><a href="AtencionMascota.php">ATENCION A LA MASCOTA</a></li>
                <li><a href="logOut.php">Cerrar sesion</a></li>
            </ul>
        </nav>
    </header>
    <?php
    include("conexion.php");
    $especie =array("Perro", "Gato");
    $sexo =array("Macho", "Hembra");
    $did=$_REQUEST['id'];
?>
    <div id="masco">
        <div class="Contenedor-inputs">
            
     <!--Modal-->
    
            <h3>Editar registro de atención mascota</h3>
            <!--Form modal-->
            <form action="Registrar_Mascota/Ed_Mascota.php" method="POST">
            <div class="ModalCuerpo">
                <input type="hidden" name="id" value="<?php echo $did?>">

                <label for="Nombre Mascota">Nombre Mascota</label>
                <?php
                        require("conexion.php");
                        $consulta = "SELECT NombreMascota FROM mascota WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                <input type="text" name="Nombre" value="<?php echo $fila['NombreMascota']; ?>">
                <br>
                
                <label for="Especie">Especie</label>
                    <select name="cboEspecie" style="width:50%">
                        <option value="0">Seleccionar</option>
                        <?php
                            require("conexion.php");
                            $consulta = "SELECT Especie FROM mascota WHERE Codigo='$did' ";
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
                <br>
                <label for="Edad">Edad</label>
                <?php
                        require("conexion.php");
                        $consulta = "SELECT Edad FROM mascota WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                <input type="number" name="Edad_Mascota" value="<?php echo $fila['Edad']; ?>">
                <br>
                <label for="Sexo">Sexo</label>
                    <select name="cboSexo" style="width:50%">
                        <option value="0">Seleccionar</option>
                        <?php
                            require("conexion.php");
                            $consulta = "SELECT Sexo FROM mascota WHERE Codigo='$did' ";
                            $resultado = $conexion->query($consulta);
                            $fila = $resultado->fetch_assoc();
                            foreach($sexo as $pos=>$sex){
                                if($fila['Sexo']==$sex){
                                    ?>
                            <option selected="true" value="<?php echo $sex?>"><?php echo $sex?></option>
                            <?php
                                }else{
                                    ?>
                            <option value="<?php echo $sex?>"><?php echo $sex?></option>
                            <?php
                                }
                            }
                            ?>
                    </select>                
                <br>
                <label for="Nombre dueño">Nombre dueño</label>
                <?php
                        require("conexion.php");
                        $consulta = "SELECT NombreDuenio FROM mascota WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                <input type="text" name="Nombre_duenio" value="<?php echo $fila['NombreDuenio']; ?>">
                <br>
                <label for="Telefono">Telefono</label>
                <?php
                        require("conexion.php");
                        $consulta = "SELECT Telefono FROM mascota WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                <input type="text" name="Telefono" value="<?php echo $fila['Telefono']; ?>"">
                <div class="modalFooter">
                </div>
                    <button type="submit" id="guardar" class="btn btn-primary">Guardar cambios</button>
                    <button> <a href="Mascota.php" title="Cerrar">Regresar</a></button>
                </div>
            </form>
            <!--Fin form modal-->
        </div>
   
    </div>
    <br><br>
    <!--Fin modal-->
    <footer>
        <p>
            AMAMOS A TUS MASCOTAS
        </p>
    </footer>
    <script src="../js/editar.js"></script>
</body>
</html>