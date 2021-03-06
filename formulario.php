<?php
@session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: index.php");
}
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title> Geonnys Pizza</title>
        <link rel="shortcut icon" type="image/x-icon" href="IMAGENES/CHEF.ico">
        <!--MI CSS-->
        <link rel="stylesheet" href="css/estilos.css" >
        <!--CSS BOOSTRAP-->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/custom.min.css" rel="stylesheet" type="text/css"/>
        <!-- ICONOS SLIDER-->
        <link rel="stylesheet" href="iconos/iconos slider/fonts.css">
        <link rel="stylesheet" href="iconos/menuNav/fonts.css">
        <!--JS Y JQUERY BOOSTRAP-->
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/popper.min.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
    </head>
    <body class="home">
        <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
            <a class="navbar-brand" href="#"></a>
            <a href="index.php"><img  src="IMAGENES/logo.PNG" alt="Logotipo Geonny" width="75%" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="btn btn-primary" href="#" >Restaurantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="#">Domicilios</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="#">Chef</a>
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
                        <a class="btn btn-primary" href="ingreso.php">Inicia sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary active" href="formulario.php">regístrate</a>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="col-lg-5">               
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <fieldset>
                        <legend>Regístrate</legend>
                        <div class="form-group">
                            <label class="col-form-label" >NUMERO DE IDENTIFICACION</label>
                            <input name="cc" type="text" class="form-control" placeholder="Ingrese Su Numero de Identificacion" >
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" >NOMBRE</label>
                            <input name="nombre" type="text" class="form-control" placeholder="Ingrese El Nombre" >
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" >APELLIDO</label>
                            <input name="apellido" type="text" class="form-control" placeholder="Ingrese El Apellido">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CORREO</label>
                            <input name="correo" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese el Correo">
                            <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">CONTRASEÑA</label>
                            <input name="contra" type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese la Contraseña">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect1">SELECCIONE EL BARRIO</label>
                            <select name="barrio" class="form-control" id="exampleSelect1">
                                <option>--seleccione--</option>
                                <?php
                                require ("conexion.php");
                                $consulta = "SELECT BARRIO FROM barrio";
                                $resultado = mysqli_query($conexion, $consulta)or die("Problemas en el select" . mysqli_error($conexion));
                                ;
                                while ($fila = mysqli_fetch_row($resultado)) {
                                    echo "<option>$fila[0]</option>";
                                }
                                mysqli_close($conexion);
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" >DIRECCION</label>
                            <input name="direc" type="text" class="form-control" placeholder="Ingrese la Direccion">
                        </div>
                        <fieldset class="form-group">
                            <label for="exampleInputPassword1">TIPO DE TELEFONO</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input name="tipo" type="radio" class="form-check-input"  id="optionsRadios1" value="option1" checked="">
                                    Fijo
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input name="tipo" type="radio" class="form-check-input"  id="optionsRadios2" value="option2">
                                    Celular
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" >NUMERO</label>
                                <input name="tel" type="text" class="form-control" placeholder="Ingrese el Numero de Telefono">
                            </div>
                        </fieldset>
                        <button type="submit" name="submit" class="btn btn-primary">REGISTRARME</button>
                    </fieldset>
                </form>
            </div>
        </div>

        <?php
        require ("conexion.php");

        function filtrado($datos) {
            $datos = trim($datos); // Elimina espacios antes y después de los datos
            $datos = stripslashes($datos); // Elimina backslashes \
            $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
            return $datos;
        }

        if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = filtrado($_POST["nombre"]);
            $cc = filtrado($_POST["cc"]);
            $apellido = filtrado($_POST["apellido"]);
            $correo = filtrado($_POST["correo"]);
            $contraseña = mysqli_real_escape_string($conexion, $_POST["contra"]);
            $barrio = filtrado($_POST["barrio"]);
            $direccion = filtrado($_POST["direc"]);
            $tipoTelef = filtrado($_POST["tipo"]);
            $telefo = filtrado($_POST["tel"]);
            /* consulta para evitar redundancia en los datos */
            $consultaid = "SELECT id_clientes,correo FROM cliente";
            $resultado = mysqli_query($conexion, $consultaid)or die("Problemas en el select" . mysqli_error($conexion));
            $flag = false;
            while ($fila = mysqli_fetch_row($resultado)) {
                if ($fila[0] == $cc || $fila[1] == $correo) {
                    $flag = true;
                }
            }
            if ($flag) {
                mysqli_close($conexion);
                echo '<script> alert("EL USUARIO YA SE ENCUENTRA REGISTRADO");</script>';
            } else {
                $consulta = "INSERT INTO cliente(id_clientes,nombre,apellido,correo,contrasena)"
                        . "VALUE ('$cc','$nombre','$apellido','$correo',MD5('$contraseña'))";
                $consulta2 = "INSERT INTO ubicacion(id_cliente,barrio,direccion) VALUE('$cc','$barrio','$direccion')";
                if ($tipoTelef == "option1") {
                    $consulta3 = "INSERT INTO telefono(id_cliente,numero,tipoTelefono)VALUE('$cc','$telefo','1')";
                } else if ($tipoTelef == "option2") {
                    $consulta3 = "INSERT INTO telefono(id_cliente,numero,tipoTelefono)VALUE('$cc','$telefo','2')";
                }
                mysqli_query($conexion, $consulta) or die("Problemas en el select" . mysqli_error($conexion));
                mysqli_query($conexion, $consulta2) or die("Problemas en el select" . mysqli_error($conexion));
                mysqli_query($conexion, $consulta3) or die("Problemas en el select" . mysqli_error($conexion));
                mysqli_close($conexion);
                echo '<script> alert("El Usuario Fue Registrado");</script>';
            }
        }
        ?>
    </body>
</html>
