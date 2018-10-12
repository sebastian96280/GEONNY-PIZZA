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
            <a href="index.php" ><img  src="IMAGENES/logo.PNG" alt="Logotipo Geonny" width="75%" ></a>
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
                    <?php
                    @session_start();
                    if (!isset($_SESSION["usuario"])) {
                        echo "<li class='nav-item'>
                                <a class='btn btn-primary' href='ingreso.php'>Inicia sesión</a>
                            </li>
                            <li class='nav-item'>
                                <a class='btn btn-primary' href='formulario.php'>Regístrate</a>
                            </li>";
                    }else{
                        echo"<li class='nav-item'>
                                <a class='btn btn-primary' href='consulta.php'>Consulta</a>
                            </li>
                        <li class='nav-item'>
                            <div class='btn-group' role='group'>
                                <button id='btnGroupDrop1' type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>".$_SESSION["usuario"]."</button>
                                <div class='dropdown-menu' aria-labelledby='btnGroupDrop1' x-placement='bottom' style='position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 0px; will-change: transform;'>
                                    <a class='dropdown-item' href='cerrarSesion.php'>Cerrar Sesion</a>
                                </div>
                            </div>
                        </li>";
                    }
                    
                    ?>       
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="contenido">
            <div class="main">
                <div class="slides">
                    <img src="https://cocina-casera.com/wp-content/uploads/2016/11/hamburguesa-queso-receta.jpg" alt="">
                    <img src="https://mejorconsalud.com/wp-content/uploads/2015/12/Comida-r%C3%A1pida-500x334.jpg" alt="">
                    <img src="https://ichef-1.bbci.co.uk/news/660/cpsprodpb/09C2/production/_95189420_plate-1968011_1920.jpg" alt="" >
                </div>
            </div>
            <!--centrado-->
            <div id="contenedor">
                <div class="cuadros" id="a" >
                    <!--almuerzos-->
                    <a href="desayunos.html" >Desayunos</a>
                </div>
                <div class="cuadros" id="b" >
                    <!--almuerzos-->
                    <a href="almuerzos.html" >Almuerzos</a>
                </div>
                <div class="cuadros" id="c">
                    <!--comidaRapida-->
                    <a href="comidaRapida.html" >Comida Rapida</a>
                </div>
            </div>  
        </div>
        <footer>
            <center>Copyring 2017</center>
        </footer>
    </div>
</div>
<!--scripts slider-->
<script src="js/slider.js"></script>
<script src="js/jquery.slides.js"></script>
<script src="js/ejecuteslider.js"></script>
</body>
</html>