<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar mascota</title>
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
                <li><a href="#">REGISTRO MASCOTAS</a></li>
                <li><a href="Producto.php">REGISTRO PRODUCTOS</a></li>
                <li><a href="AtencionMascota.php">ATENCION A LA MASCOTA</a></li>
                <li><a href="logOut.php">Cerrar sesion</a></li>
            </ul>
        </nav>
    </header>
    <div id="masco">
        <div class="Contenedor-inputs">
            <img class="avatar" src="../IMAGENES/icon2.jpg" alt="Error al cargar la imagen">
            <h1>REGISTRO MASCOTA</h1>
            <!-- formulario -->
            <form action="Registrar_Mascota/R_Mascota.php" method="POST">
                <label for="Codigo">Codigo</label>
                <input type="text" name="Codigo" placeholder="Codigo">
                <label for="Nombre Mascota">Nombre Mascota</label>
                <input type="text" name="Nombre" placeholder="Nombre">
                <label for="Especie">Especie</label>
                <div>
                    <select name="cboEspecie" style="width:100%">
                        <option value="-1">Seleccionar</option>
                        <option value="Perro">Perro</option>
                        <option value="Gato">Gato</option>
                    </select>
                </div><br>
                <label for="Edad">Edad</label>
                <input type="number" name="Edad_Mascota" placeholder="Edad">
                <label for="Sexo">Sexo</label>
                <div>
                    <select name="cboSexo" style="width:100%">
                        <option value="-1">Seleccionar</option>
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                </div><br>
                <label for="Nombre dueño">Nombre dueño</label>
                <input type="text" name="Nombre_duenio" placeholder="Nombre dueño">
                <label for="Telefono">Telefono</label>
                <input type="number" name="Telefono" placeholder="Telefono">
                <input type="submit" value="REGISTRAR">
            </form>
        </div>
    </div>
    <br><br>
    <!--Tabla-->
    <div id="table">
        <table class="table">
            <tr>
                <th>Codigo</th>
                <th>Nombre Mascota</th>
                <th>Especie</th>
                <th>Edad</th>
                <th>sexo</th>
                <th>Nombre Dueño</th>
                <th>Telefono</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php                                   
                require("conexion.php");
                $consulta = "SELECT * FROM mascota";
                $resultado = $conexion->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {
            ?>
            <tr>
          <td> <?php echo $fila['Codigo']; ?></td>
                <td> <?php echo $fila['NombreMascota']; ?></td>
                <td> <?php echo $fila['Especie']; ?></td>
                <td> <?php echo $fila['Edad']; ?></td>
                <td> <?php echo $fila['Sexo']; ?></td>
                <td> <?php echo $fila['NombreDuenio']; ?></td>
                <td> <?php echo $fila['Telefono']; ?></td>
                <td>
                    <a href="editarMascota.php?id=<?php echo $fila['Codigo']; ?>">
                    <img src="../IMAGENES/edit.png" alt="Editar" style="height:40px"></a>
                </td>
                 <td><a href="Registrar_Mascota/Eli_Mascota.php?id=<?php echo $fila['Codigo']; ?>">
                 <img src="../IMAGENES/trash.png" alt="Borrar" style="height:40px"></a>
                        </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    <!--Fin tabla-->
   
    <footer>
        <p>
            AMAMOS A TUS MASCOTAS
        </p>
    </footer>
</body>
</html>