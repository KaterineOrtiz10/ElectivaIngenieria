<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atencion mascotas</title>
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
                <li><a href="Producto.php">REGISTRO PRODUCTOS</a></li>
                <li><a href="#">ATENCION A LA MASCOTA</a></li>
                <li><a href="logOut.php">CERRAR SESION</a></li>
            </ul>
        </nav>
    </header>
    <div id="servi">
        <div class="Conte-inputs">
            <img class="avatar" src="../IMAGENES/icon2.jpg" alt="Error al cargar la imagen">
            <h1>ATENCIÓN A LA MASCOTA</h1>
            <!--Formulario-->
            <form action="AtencionMascota/R_AtencioMascota.php" method="POST">
                <label for="Id_servicio">Servicio</label>
                <select style="width:100%" name="servicio">
                    <option value="0">Seleccione servicio</option>
                    <?php
                        require("conexion.php");
                        $consulta = "SELECT * FROM servicios";
                        $resultado = $conexion->query($consulta);
                        while ($fila = $resultado->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $fila['Codigo']; ?>"><?php echo $fila['Nombre_Servicio']; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <label for="Id_Mascota">Mascota</label>
                <select style="width:100%" name="mascota">
                    <option value="0">Seleccione mascota</option>
                    <?php
                        require("conexion.php");
                        $consulta = "SELECT * FROM mascota";
                        $resultado = $conexion->query($consulta);
                        while ($fila = $resultado->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $fila['Codigo']; ?>"><?php echo $fila['NombreMascota']; ?></option>
                    <?php
                        }
                     ?>
                </select>
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" placeholder="Fecha" required>
                <input type="submit" value="REGISTRAR">
            </form>
            <!--Fin formulario-->
        </div>
    </div>
    <!--Tabla-->
    <div id="table">
        <table class="table">
            <tr>
                <th>Código del registro</th>
                <th>Servicio</th>
                <th>Mascota</th>
                <th>Fecha de atención</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>

            <?php                                   
                require("conexion.php");
                $consulta = "SELECT am.Codigo, am.Fecha, s.Nombre_Servicio, m.NombreMascota FROM atencion_a_la_mascota am, servicios s, mascota m WHERE m.Codigo= am.Cod_Mascota AND s.Codigo=am.Cod_Servicio";
                $resultado = $conexion->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {
            ?>
            <tr>
                <td> <?php echo $fila['Codigo']; ?></td>
                <td> <?php echo $fila['Nombre_Servicio']; ?></td>
                <td> <?php echo $fila['NombreMascota']; ?></td>
                <td> <?php echo $fila['Fecha']; ?></td>
                <td>
                    <a class="view__noreinfo" href="#exampleModal" onclick="dato(<?php echo $fila['Codigo'];?>)">
                    <img src="../IMAGENES/edit.png" alt="Editar" style="height:40px"></a>
                </td>
                <td>
                    <a href="AtencionMascota/Eli_AtencionMascota.php?id=<?php echo $fila['Codigo']; ?>">
                    <img src="../IMAGENES/trash.png" alt="Borrar" style="height:40px"></a>
                </td>
            </tr>
            <?php
                }
            ?>

        </table>
    </div>
    <!--Fin tabla-->

    <!--Modal-->
    <div class="openClick" id="exampleModal">
        <div class="cajaModal efecto">
            <a href="#close" title="Cerrar" class="close">X</a>
            <h3>Editar registro de atención mascota</h3>
            <!--From modal-->
            <form action="AtencionMascota/Ed_AtencioMascota.php" method="POST" autocomplete="off">
                <div class="ModalCuerpo">
                    <p id="espacio"></p>
                    <label for="Id_servicio">Servicio</label>
                    <select style="width:100%" name="servicio">
                        <option value="0">Seleccione</option>
                        <?php
                                require("conexion.php");
                                $consulta = "SELECT * FROM servicios";
                                $resultado = $conexion->query($consulta);
                                while ($fila = $resultado->fetch_assoc()) {
                            ?>
                        <option value="<?php echo $fila['Codigo']; ?>"><?php echo $fila['Nombre_Servicio']; ?>
                        </option>
                        <?php
                                }
                            ?>
                    </select>
                    <label for="Id_Mascota">Mascota</label>
                    <select style="width:100%" name="mascota">
                        <option value="0">Seleccione</option>
                        <?php
                                require("conexion.php");
                                $consulta = "SELECT * FROM mascota";
                                $resultado = $conexion->query($consulta);
                                while ($fila = $resultado->fetch_assoc()) {
                            ?>
                        <option value="<?php echo $fila['Codigo']; ?>"><?php echo $fila['NombreMascota']; ?>
                        </option>
                        <?php
                                }
                            ?>
                    </select>
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" placeholder="Fecha">
                </div>
                <div class="modalFooter">
                    <button type="submit" id="guardar" class="btn btn-primary">Guardar cambios</button>
                    <button> <a href="#close" title="Cerrar">Cerrar</a></button>
                </div>
            </form>
            <!--Fin form modal-->
        </div>
    </div>
    <!--Fin modal-->
    <footer>
        <p>
            ¡AMAMOS A TUS MASCOTAS!
        </p>
    </footer>
    <script src="../js/editar.js"></script>
</body>

</html>