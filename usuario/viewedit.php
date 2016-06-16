 <?php
    require '../clases/Autoload.php';
    $bd = new Database();
    $gestor = new ManageUsuario($bd);
    $correo = Request::get("correo");
    $usuario = $gestor->get($correo);
    
 ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
         <!-- jQuery -->
         <script src="../js/jquery.min.js"></script>
        <!-- jQuery Validation -->
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/messages.js"></script>
        <script src="../js/scripts.js"></script>
        <title>Editar Usuario</title>
    </head>
    <body>
            <h2>Editar Usuario en la Tabla de Usuario</h2>
            <form method="POST" id="formulario" name="formulario" action="phpedit.php">
            &nbsp;<input type="hidden"  name="text" value="<?php echo $usuario->getCorreo(); ?>" />
            Clave:&nbsp;<input type="password"  id="clave" name="clave" value="<?php echo $usuario->getClave(); ?>" /><br/><br/>
            Clave2:&nbsp;<input type="password" id="clave2"  name="clave2" value="<?php echo $usuario->getClave(); ?>" /><br/><br/>
            Nombre:&nbsp; <input type="text" id="nombre"  name="nombre" value="<?php echo $usuario->getNombre(); ?>" /><br/><br/>
            Apellidos:&nbsp;<input type="text" id="apellidos"  name="apellidos" value="<?php echo $usuario->getApellidos(); ?>" /><br/><br/>
            Dirección:   <input type="text" id="direccion"  name="direccion" value="<?php echo $usuario->getDireccion(); ?>" /><br/><br/>            
            Tipo:&nbsp; <input type="text" id="tipo"  name="tipo" value="<?php echo $usuario->getTipo(); ?>" /><br/><br/>
            Activo:&nbsp;   <input type="text" id="activo"  name="activo" value="<?php echo $usuario->getActivo(); ?>" /><br/><br/>
            Fecha:&nbsp;   <input type="text" id="fecha"  name="fecha" value="<?php echo $usuario->getFecha(); ?>" /><br/><br/>
            <input type="submit" class="modi" id="modi" name="modi" value="Modificar"/>
        </form>
        <a href="index.php">Cancelar y volver pá ¡atrás!</a>
    </body>
</html>
<?php
$bd->close();
?>