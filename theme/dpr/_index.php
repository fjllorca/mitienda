<?php
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>ExtremE_WilD_SportS_Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <base href="http://localhost/mitienda/">
        <link rel="stylesheet" href="theme/dpr/css/fontello.css">
        <link rel="stylesheet" href="theme/dpr/css/estilos.css">
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>  
        <script src="js/main.js"></script>   
        <script src="js/messages.js"></script>
        <script src="js/scripts.js"></script> 
    </head>
    <body>
        <header>
            <div class="contenedor">
                <img id="logo" src="theme/dpr/img/Wild-Spor_Logo3.png"/>
                <input type="checkbox" id="menu-bar">
                <label class="icon-menu" for="menu-bar"></label>
                <nav class="menu">
                    <a href="../../../index.php">Home</a>
                    <a href="theme/dpr/html/sports.html">Sports</a>
                    <a href="theme/dpr/html/aboutus.html">About Us</a>
                    <a href="theme/dpr/html/contacus.html">Contact Us</a>
                    <a> {login} </a>
                </nav>
            </div>
        </header>
        <main>
            <section id="banner">
                <img src="theme/dpr/img/banner.jpg">
                <div class="contenedor">
                    <h2>Extreme Wild Sports</h2>
                    <p>which is your favorite sport?</p>
                </div>
            </section>
            <section id="info">
                <div class="contenedor">
                    <div class="info-pet">
                        {logeado} <!--Como hacer que no se vean una vez escogida una de ellas en la vista-->
                        {contenido}
                        {precontenido}
                        {editarusuario}
                        {registrar}
                        {seleccionAdministradores}
                        {seleccionUsuarios}

                    </div>

                </div>
            </section>

        </main>

        <footer>
            <div class="contenedor">
                <p class="copy">ExtremE WilD SportS &copy; DAW PHP,HTML5,CSS3,JS,JQUERY 2016</p>
                <div class="sociales">
                    <a class="icon-facebook" href="#"></a>
                    <a class="icon-twitter" href=""></a>
                    <a class="icon-instagram" href=""></a>
                    <a class="icon-googleplus" href=""></a>
                </div>
            </div>
        </footer>
    </body>
</html>