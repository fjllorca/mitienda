 <?php
    require '../clases/AutoCarga.php';
    $bd = new Database();
    $gestor = new ManageProducto($bd);
    $id = Request::get("id");
    $producto = $gestor->get($id);
    
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
            Id:&nbsp;<input type="text"  name="id" value="<?php echo $producto->getId(); ?>" /><br/><br/>           
            Nombre:&nbsp; <input type="text"  name="nombre" value="<?php echo $producto->getNombre(); ?>" /><br/><br/>
            Precio:&nbsp;<input type="text"  name="precio" value="<?php echo $producto->getPrecio(); ?>" /><br/><br/>
            Iva:   <input type="text"  name="iva" value="<?php echo $producto->getIva(); ?>" /><br/><br/>              
            Activo:&nbsp;   <input type="text"  name="activo" value="<?php echo $producto->getActivo(); ?>" /><br/><br/>          
            <input type="submit" class="modi "id="modi" name="modi" value="Modificar"/>
        </form>
        <!--<a href="index.php">Volver atrás</a>-->
    </body>
</html>
<?php
$bd->close();
?>