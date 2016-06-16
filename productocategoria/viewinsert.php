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
        <title>Insertar ProductoCategoria</title>
    </head>
    <body>
        
        <h2>Insertar ProductoCategoria</h2>
        <form method="POST" action="phpinsert.php">
            IdProducto:&nbsp;<input type="text"  name="idproducto" value="<?php echo $productocategoria->getIdproducto(); ?>" /><br/><br/>           
            IdCategoria:&nbsp; <input type="text"  name="idcategoria" value="<?php echo $productocategoria->getIdcategoria(); ?>" /><br/><br/>
                                    
            <input type="submit" id="Insertar" value="Insertar"/>
        </form>
        <a href="index.php">Volver atrás</a>
        
    </body>
</html>
<?php
$bd->close();
?>