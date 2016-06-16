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
        <title></title>
         <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"
        type="text/javascript"></script>
        <!-- jQuery Validation -->
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"
        type="text/javascript"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/messages.js"></script>
        <title>Insertar Venta</title>
    </head>
    <body>
        
        <h2>Insertar Venta</h2>
        <form method="POST" action="phpinsert.php">
            Id:&nbsp;<input type="text"  name="id" value="<?php echo $venta->getId(); ?>" /><br/><br/>           
            Correo:&nbsp; <input type="text"  name="correo" value="<?php echo $venta->getCorreo(); ?>" /><br/><br/>
            Fecha:&nbsp;<input type="date"  name="fecha" value="<?php echo $venta->getFecha(); ?>" /><br/><br/>
            Pagado:   <input type="text"  name="pagado" value="<?php echo $venta->getPagado(); ?>" /><br/><br/>                         
            <input type="submit" id="Insertar" value="Insertar"/>
        </form>
        <a href="index.php">Volver atrás</a>
        
    </body>
</html>
<?php
$bd->close();
?>