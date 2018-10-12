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
                        <a class="btn btn-primary active" href="ingreso.php">Inicia sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="formulario.php">regístrate</a>
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
                        <legend>Inicia sesión</legend>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CORREO</label>
                            <input name="email" type="email" class="form-control"   placeholder="Ingrese el Correo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">CONTRASEÑA</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese la Contraseña">
                        </div>
                        <button name="submit"type="submit" class="btn btn-primary">Ingresar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>        
    <?php
    require ("conexion.php");
    if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $correo = $_POST["email"];
        $contra = $_POST["password"];
        $sql = "SELECT * FROM cliente WHERE correo='$correo' AND contrasena= MD5('$contra')";
        $resultado = mysqli_query($conexion, $sql)or die("Problemas en el select" . mysqli_error($conexion));
        $flag = true;
        while ($fila = mysqli_fetch_array($resultado)) {
            echo $fila["correo"];
            if ($fila > 1) {
                $flag = false;                
            /* Iniciar la Sesion */
                @session_start();
                $_SESSION["usuario"] = $fila["nombre"];
                break;
            }
        }if ($flag) {
            echo '<script> alert("Usuario o Contraseña Incorrectos");</script>';
        } else {
            header("Location: consulta.php");
            echo '<script> alert("Bienvenido ' . $fila["nombre"] . ' ");</script>';
        }
    }
    ?>
</body>
</html>
