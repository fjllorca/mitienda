 <?php
    require '../clases/AutoCarga.php';
    $bd = new Database();
    $gestor = new ManageVenta($bd);
    $id = Request::get("id");
    $venta = $gestor->get($id);
    
 ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
         <!-- jQuery -->
         <script src="../js/jquery.min.js"type="text/javascript"></script>
        <!-- jQuery Validation -->
        <script src="../js/jquery.validate.min.js"type="text/javascript"></script>
        <script src="../js/main.js"></script>
        <script src="../js/messages.js"></script>
        <script src="../js/scripts.js"></script>
        <title>Editar Venta</title>
    </head>
    <body>
            <h2>Editar Venta</h2>
        <form method="POST" action="phpedit.php">
             Id:&nbsp;<input type="text"  name="id" value="<?php echo $venta->getId(); ?>" /><br/><br/>           
            Correo:&nbsp; <input type="text"  name="correo" value="<?php echo $venta->getCorreo(); ?>" /><br/><br/>
            Fecha:&nbsp;<input type="date"  name="fecha" value="<?php echo $venta->getFecha(); ?>" /><br/><br/>
            Pagado:   <input type="text"  name="pagado" value="<?php echo $venta->getPagado(); ?>" /><br/><br/> 
            <input type="submit" class="modi "id="modi" name="modi" value="Modificar"/>
        </form>
        <a href="index.php">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>