<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title> Geonnys Pizza</title>
        <!--MI CSS-->
        <link rel="stylesheet" href="css/estilos.css" >
        <!--CSS BOOSTRAP-->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/custom.min.css" rel="stylesheet" type="text/css"/>
        <!--JS Y JQUERY BOOSTRAP-->
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/popper.min.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
    </head>
    <body class="consulta">
        <div id="principal">
            <header>
                <div>
                    <a href="index.php"><img src="IMAGENES/GEONNY PIZZA.PNG" alt="Logotipo Geonny" > </a>
                </div>
                <!--menuDeNavegacion-->
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <a class="navbar-brand" href="#">PAGINA PRINCIPAL</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#" >NUESTROS RESTAURANTES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">DOMICILIOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">CHEF</a>
                            </li>
                            <li class="nav-item">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">COMIDAS</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom" style="position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 0px; will-change: transform;" >
                                        <a class="dropdown-item" href="desayunos.html">DESAYUNO</a>
                                        <a class="dropdown-item" href="almuerzos.html">ALMUERZO</a>
                                        <a class="dropdown-item" href="comidaRapida.html">COMIDA RAPIDA</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USUARIO</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom" style="position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="formulario.php">REGISTRO</a>
                                        <a class="dropdown-item" href="ingreso.html">INGRESAR</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BIENVENIDO #</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom" style="position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="consulta.php">CONSULTA</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <br>
            <br>
            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
                <div class="col-lg-5" >
                    <div class="form-group">                    
                        <label for="exampleSelect1">SELECCIONE LA TABLA</label>
                        <select name="select" class="form-control" id="exampleSelect1">
                            <option>--SELECCIONE--</option>
                            <option>CLIENTES</option>
                            <option>PRODUCTOS</option>                            
                        </select>                    
                        <label class="col-form-label col-form-label-sm" for="inputSmall">Busqueda Especifica</label>
                        <input class="form-control form-control-sm" name="busqueda" type="text" placeholder="Buscar" id="inputSmall">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">BUSCAR</button>
                </div>
        </div>
        <?php
        require ("conexion.php");

        function eliminar($numero) {
            require ("conexion.php");
            $valor = filtrado($numero);
            $consulta = "DELETE FROM `cliente` WHERE `id_clientes`=$valor";
            $resultado = mysqli_query($conexion, $consulta)or die("Problemas en el select" . mysqli_error($conexion));
            echo '<script> alert("El Usuario Ha Sido Eliminado");</script>';
        }

        function filtrado($datos) {
            $datos = trim($datos); // Elimina espacios antes y después de los datos
            $datos = stripslashes($datos); // Elimina backslashes \
            $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
            return $datos;
        }

        if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $tipo = filtrado($_POST["select"]);
            $parametro = filtrado($_POST["busqueda"]);
            if ($tipo == "CLIENTES" && $parametro == "") {
                $consulta = "SELECT `id_clientes`, `nombre`, `apellido`, `correo` FROM `cliente`";
                $resultado = mysqli_query($conexion, $consulta)or die("Problemas en el select" . mysqli_error($conexion));
                $contador = 0;
                while ($fila = mysqli_fetch_row($resultado)) {
                    $contador++;
                    if ($contador == 1) {
                        echo "<br><br><div class='col-lg-8' style='margin:auto;'> 
                                <div class='page-header'>
                                    <table class='table table-hover'>
                                        <tbody>
                                            <tr class='table-primary'>
                                                <th scope='row'>CEDULA</th>
                                                <th scope='row'>NOMBRE</th>
                                                <th scope='row'>APELLIDO</th>
                                                <th scope='row'>CORREO</th>
                                                <th scope='row'>ELIMINAR</th>
                                            </tr>";
                    }
                    echo"<tr class='table-dark'>
                            <td>$fila[0]</td>
                            <td>$fila[1]</td>
                            <td>$fila[2]</td>
                            <td>$fila[3]</td>
                            <td>
                                <button type='eliminar' value='$fila[0]'class='btn btn-danger' name='eliminar'>ELIMINAR</button>
                            </td>
                         </tr>";
                }echo "</tbody>
                    </table>
                </div>
            </div>";
            } else if ($tipo == "CLIENTES" && $parametro != "") {
                $consulta = "SELECT `id_clientes`, `nombre`, `apellido`, `correo` FROM `cliente`";
                $resultado = mysqli_query($conexion, $consulta)or die("Problemas en el select" . mysqli_error($conexion));
                $contador = 0;
                while ($fila = mysqli_fetch_row($resultado)) {
                    if ($fila[0] == $parametro || $fila[1] == $parametro || $fila[2] == $parametro || $fila[3] == $parametro) {
                        $contador++;
                        if ($contador == 1) {
                            echo "<br><br><div class='col-lg-8' style='margin:auto;'>
                                    <div class='page-header'>
                                        <table class='table table-hover'>
                                            <tbody>
                                                <tr class='table-primary'>
                                                    <th scope='row'>CEDULA</th>
                                                    <th scope='row'>NOMBRE</th>
                                                    <th scope='row'>APELLIDO</th>
                                                    <th scope='row'>CORREO</th>
                                                    <th scope='row'>ELIMINAR</th>
                                                </tr>";
                        }
                        echo"<tr class='table-dark'>
                                <td>$fila[0]</td>
                                <td>$fila[1]</td>
                                <td>$fila[2]</td>
                                <td>$fila[3]</td>
                                <td>
                                    <button type='eliminar' value='$fila[0]'class='btn btn-danger' name='eliminar'>ELIMINAR</button>
                                </td>
                             </tr>";
                    }
                }echo "</tbody>
                    </table>
                </div>
            </div>";
                mysqli_close($conexion);
            }
            if ($tipo == "PRODUCTOS" && $parametro == "") {
                $consulta = "SELECT `id_producto`,`nombre-producto`, `precio`, `foto` FROM `tipo-producto";
                $resultado = mysqli_query($conexion, $consulta)or die("Problemas en el select" . mysqli_error($conexion));
                $contador = 0;
                while ($fila = mysqli_fetch_row($resultado)) {
                    $contador++;
                    if ($contador == 1) {
                        echo "<br><br><div class='col-lg-8' style='margin:auto;'>
                                    <div class='page-header'>
                                        <table class='table table-hover'>
                                            <tbody>
                                                <tr class='table-primary'>
                                                    <th scope='row'>ID</th>
                                                    <th scope='row'>NOMBRE</th>
                                                    <th scope='row'>PRECIO</th>
                                                    <th scope='row'>IMAGEN</th>
                                                    <th scope='row'>ACTUALIZAR</th>                                                   
                                                </tr>";
                    }
                    echo"<tr class='table-dark'>
                                <td>$fila[0]</td>
                                <td>$fila[1]</td>
                                <td>$fila[2]</td>
                                <td>$fila[3]</td>
                                 <td>
                                    <button type='actualizar' value='$fila[0]'class='btn btn-info' name='actualizar'>ACTUALIZAR</button>
                                </td>
                                </tr>";
                }echo "</tbody>
                    </table>
                </div>
            </div>";
            } else if ($tipo == "PRODUCTOS" && $parametro != "") {
                
            }
        }
        if (isset($_POST["eliminar"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
            eliminar($_POST["eliminar"]);
        }
        if (isset($_POST["actualizar"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["actualizar"];
            $consulta = "SELECT * FROM `tipo-producto` WHERE `id_producto`=$id";
            $resultado = mysqli_query($conexion, $consulta)or die("Problemas en el select" . mysqli_error($conexion));
            $contador = 0;
            while ($fila = mysqli_fetch_row($resultado)) {
                $contador++;
                if ($contador == 1) {
                    echo "<br><br><div class='col-lg-8' style='margin:auto;'>
                                    <div class='page-header'>
                                        <table class='table table-hover'>
                                            <tbody>
                                                <tr class='table-primary'>
                                                    <th scope='row'>ID</th>
                                                    <th scope='row'>NOMBRE</th>
                                                    <th scope='row'>PRECIO</th>
                                                    <th scope='row'>IMAGEN</th>
                                                    <th scope='row'>GUARDAR</th>                                                   
                                                </tr>";
                }
                echo"<tr class='table-dark'>
                                <td>$fila[0]</td>
                                <td>$fila[1]</td>
                                <td><input name='precio' type='text' class='form-control' placeholder=$fila[2]></td>
                                <td><input name='file' type='file' class='form-control' ></td>
                                <td>
                                    <button type='guardar' value='$fila[0]' class='btn btn-success' name='guardar' >GUARDAR</button>
                                </td>
                                </tr>";
            }echo "</tbody>
                    </table>
                </div>
            </div>";
        }
        if (isset($_POST["guardar"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
            echo $id=$_POST["guardar"];
            echo $precio=$_POST["precio"];
            echo $nombreImagen=$_FILES["file"]["name"];
            $consulta="UPDATE `tipo-producto` SET `foto`=$nombreImagen WHERE `id_producto`=$id";
            $resultado = mysqli_query($conexion, $consulta)or die("Problemas en el select" . mysqli_error($conexion));
            echo '<script> alert("El Usuario Ha Sido Eliminado");</script>';
        }
        ?>
    </body>
</html>


