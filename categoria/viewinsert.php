<?php
    require '../clases/AutoCarga.php';
    $bd = new Database();
    $gestor = new ManageCategoria($bd);
    $id = Request::get("id");
    $categoria = $gestor->get($id);
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
        <title>Insertar Usuario</title>
    </head>
    <body>
        
        <h2>Insertar Categoria</h2>
        <form method="POST" action="phpinsert.php">
             Id:&nbsp;<input type="text"  name="id" value="<?php echo $categoria->getId(); ?>" /><br/><br/>            
            Nombre:&nbsp; <input type="text"  name="nombre" value="<?php echo $categoria->getNombre(); ?>" /><br/><br/>
            <input type="submit" id="Insertar" value="Insertar"/>
        </form>
        <a href="index.php">Volver atrás</a>
        
    </body>
</html>
<?php
$bd->close();
?>