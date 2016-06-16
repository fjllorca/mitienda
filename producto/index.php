<?php
    require '../clases/AutoCarga.php';
    $bd = new Database();
    $gestor = new ManageProducto($bd);
    $page=  Request::get('page');
    if($page===null || $page===""){
        $page=1;
    }
    $registros = $gestor -> count();
    $paginas = ceil($registros /  Contants::NRPP); //ceil devuelve el primer entero >= que el numero que tengo
    $order=  Request::get("order");
    $sort=  Request::get("sort");
    $orden="$order $sort";
    
    //La pagina ordena bien, pero cuando pasamos de pagina ya no lo hace. Es decir, sí lo hace por el campo que le hayamos dicho,
    //pero no mantiene un segundo orden lógico (que debería ser el nombre de la ciudad, por ejemplo), lo mezcla todo
    $trozoEnlace="";
    if(trim($orden)!=""){
        $trozoEnlace="&order=$order&sort=$sort";
    }
    $productos = $gestor->getList($page,trim($orden));
    $op = Request::get("op");
    $r = Request::get("r");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Usuarios</title>
        <script src="../js/scripts.js"></script>
    </head>
    <body>
        <h3><a href="viewinsert.php">InZertar Produzto</a></h3>
        <table border="1">
            <thead>
                <tr>
                    <!--$id,$nombre,$precio,$iva,$activo;-->
                    <!-- Aqui mandamos order, campo x el que queremos ordenar, y sort, de qué modo queremos hacerlo !-->
                    <th>
                        &nbsp;<a href="?order=id&sort=asc">&Delta; </a>&nbsp;
                        &nbsp;Id:&nbsp; 
                        &nbsp;<a href="?order=id&sort=desc">&Del; </a>&nbsp;                        
                    </th>                    
                     <th>
                        &nbsp;<a href="?order=nombre&sort=asc">&Delta; </a>&nbsp;
                        &nbsp;Nombre: &nbsp;
                        &nbsp;<a href="?order=nombre&sort=desc">&Del; </a>&nbsp;                       
                    </th>
                     <th>
                         &nbsp;<a href="?order=precio&sort=asc">&Delta; </a>&nbsp;
                        &nbsp;Precio:&nbsp;
                        &nbsp;<a href="?order=precio&sort=desc">&Del; </a>&nbsp;                        
                    </th>
                    <th>
                        &nbsp;<a href="?order=iva&sort=asc">&Delta; </a>&nbsp;
                        &nbsp;Iva:&nbsp;
                        &nbsp;<a href="?order=iva&sort=desc">&Del; </a>&nbsp;                        
                    </th>                    
                    <th>
                        &nbsp;<a href="?order=activo&sort=asc">&Delta; </a>&nbsp;
                        &nbsp;Activo:&nbsp;
                        &nbsp;<a href="?order=activo&sort=desc">&Del; </a>&nbsp;                        
                    </th>                    
                    <th colspan="3">Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="7">
                         <a href='?page=1<?= $trozoEnlace ?>'>Primero</a>
                         <a href="?page=<?php echo max(1, $page-1).$trozoEnlace ?>">Anterior</a>
                         <a href="?page=<?php echo min($page+1,$paginas).$trozoEnlace ?>">Siguiente </a>
                         <a href="?page=<?php echo $paginas.$trozoEnlace ?>">Última </a>                         
                    </td>
                </tr>
            </tfoot>
            <tbody>
                
                <?php 
                
//                if($op!=null){if($op===0){
//                                echo "<h1>La operacion $op ha Zido un escito $r</h1>";}
//                        }else{echo "<h1>La operacion $op ha Zido un Fracazo $r</h1>";}
                if($op!=null){
                        echo "<h1>La operacion $op ha dado como resultado $r</h1>";
                        }
                foreach ($productos as $indice => $producto) { ?>
                
                <tr>
                    <td><?php echo $producto->getId() ?></td>                    
                    <td><?php echo $producto->getNombre(); ?></td>
                    <td><?php echo $producto->getPrecio(); ?></td>
                    <td><?php echo $producto->getIva(); ?></td>                    
                    <td><?php echo $producto->getActivo(); ?></td>                    
                    <td>
                        <a class='borrar' href='phpdelete.php?id=<?php echo $producto->getId(); ?>'>Borrar</a>
                        <a href='viewedit.php?id=<?php echo $producto->getId(); ?>'>Editar</a><br/>
                    </td>
                  
                </tr>
                <?php
                }
                ?>
            </tbody>
            
          
        </table>
        <!--<a href="../SeleccionAdministradores.html">Volver atrás</a>-->
         
    </body>
</html>
<?php
$bd->close();
?>