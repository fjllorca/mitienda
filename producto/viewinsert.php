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
        <title>Insertar Producto</title>
    </head>
    <body>
        
        <h2>Insertar Producto</h2>
        <form method="POST" action="phpinsert.php">
            Id:&nbsp;<input type="text"  name="id" value="<?php echo $producto->getId(); ?>" /><br/><br/>           
            Nombre:&nbsp; <input type="text"  name="nombre" value="<?php echo $producto->getNombre(); ?>" /><br/><br/>
            Precio:&nbsp;<input type="text"  name="precio" value="<?php echo $producto->getPrecio(); ?>" /><br/><br/>
            Iva:   <input type="text"  name="iva" value="<?php echo $producto->getIva(); ?>" /><br/><br/>              
            Activo:&nbsp;   <input type="text"  name="activo" value="<?php echo $producto->getActivo(); ?>" /><br/><br/> 
            <input type="submit" id="Insertar" value="Insertar"/>
        </form>
        <a href="index.php">Volver atrás</a>
        
    </body>
</html>
<?php
$bd->close();
?>