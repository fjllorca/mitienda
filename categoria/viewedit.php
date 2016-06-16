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
        
         <!-- jQuery -->
         <script src="../js/jquery.min.js"type="text/javascript"></script>
        <!-- jQuery Validation -->
        <script src="../js/jquery.validate.min.js"type="text/javascript"></script>
        <script src="../js/main.js"></script>
        <script src="../js/messages.js"></script>
        <script src="../js/scripts.js"></script>
        <title>Editar categoria</title>
    </head>
    <body>
            <h2>Editar Usuario en la Tabla de Usuario</h2>
        <form method="POST" action="phpedit.php">
            Id:&nbsp;<input type="text"  name="id" value="<?php echo $categoria->getId(); ?>" /><br/><br/>            
            Nombre:&nbsp; <input type="text"  name="nombre" value="<?php echo $categoria->getNombre(); ?>" /><br/><br/>
            <input type="submit" class="modi "id="modi" name="modi" value="Modificar"/>
        </form>
        <!--<a href="index.php">Volver atrás</a>-->
    </body>
</html>
<?php
$bd->close();
?>