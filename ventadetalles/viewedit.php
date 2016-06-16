 <?php
    require '../clases/AutoCarga.php';
    $bd = new Database();
    $gestor = new ManageVentaDetalle($bd);
    $id = Request::get("id");
    $ventadetalle = $gestor->get($id);
    
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
        <title>Editar Producto</title>
    </head>
    <body>
            <h2>Editar Producto</h2>
        <form method="POST" action="phpedit.php">
            Id:&nbsp;<input type="text"  name="id" value="<?php echo $ventadetalle->getId(); ?>" /><br/><br/>           
            IdVenta:&nbsp; <input type="text"  name="idventa" value="<?php echo $ventadetalle->getIdventa(); ?>" /><br/><br/>
            IdProducto:&nbsp;<input type="text"  name="idproducto" value="<?php echo $ventadetalle->getIdproducto(); ?>" /><br/><br/>
            Cantidad:   <input type="text"  name="cantidad" value="<?php echo $ventadetalle->getCantidad(); ?>" /><br/><br/>              
            Precio:&nbsp;   <input type="text"  name="precio" value="<?php echo $ventadetalle->getPrecio(); ?>" /><br/><br/>          
            Iva:   <input type="text"  name="iva" value="<?php echo $ventadetalle->getIva(); ?>" /><br/><br/> 
            <input type="submit" class="modi "id="modi" name="modi" value="Modificar"/>
        </form>
        <a href="index.php">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>