 <?php
    require '../clases/AutoCarga.php';
    $bd = new Database();
    $gestor = new ManageProductoCategoria($bd);
    $idproducto = Request::get("idproducto");
    $productocategoria = $gestor->get($idproducto);
    
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
        <title>Editar ProductoCategoria</title>
    </head>
    <body>
            <h2>Editar ProductoCategoria</h2>
        <form method="POST" action="phpedit.php">
            IdProducto:&nbsp;<input type="text"  name="idproducto" value="<?php echo $productocategoria->getIdproducto(); ?>" /><br/><br/>           
            IdCategoria:&nbsp; <input type="text"  name="idcategoria" value="<?php echo $productocategoria->getIdcategoria(); ?>" /><br/><br/>
            
            <input type="submit" class="modi "id="modi" name="modi" value="Modificar"/>
        </form>
        <a href="index.php">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>