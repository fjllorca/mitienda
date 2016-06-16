<?php
    require '../clases/AutoCarga.php';
    $bd = new Database();
    $gestor = new ManageVentaDetalle($bd);
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
    $ventasdetalles = $gestor->getList($page,trim($orden));
    $op = Request::get("op");
    $r = Request::get("r");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!--$id,$idventa,$idproducto,$cantidad,$precio,$iva-->
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>VentaDetalle</title>
        <script src="../js/scripts.js"></script>
    </head>
    <body>
        <h3><a href="viewinsert.php">InZertar VentaDetalle</a></h3>
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
                        &nbsp;<a href="?order=idventa&sort=asc">&Delta; </a>&nbsp;
                        &nbsp;IdVenta: &nbsp;
                        &nbsp;<a href="?order=idventa&sort=desc">&Del; </a>&nbsp;                       
                    </th>
                                     
                    <th>
                        &nbsp;<a href="?order=idproducto&sort=asc">&Delta; </a>&nbsp;
                        &nbsp;IdProducto:&nbsp;
                        &nbsp;<a href="?order=idproducto&sort=desc">&Del; </a>&nbsp;                        
                    </th>   
                    <th>
                        &nbsp;<a href="?order=cantidad&sort=asc">&Delta; </a>&nbsp;
                        &nbsp;Cantidad:&nbsp;
                        &nbsp;<a href="?order=cantidad&sort=desc">&Del; </a>&nbsp;                        
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
                foreach ($ventasdetalles as $indice => $ventadetalle) { ?>
                
                <tr>
                    <td><?php echo $ventadetalle->getId() ?></td>                    
                    <td><?php echo $ventadetalle->getIdventa(); ?></td>
                    <td><?php echo $ventadetalle->getIdproducto(); ?></td>
                    <td><?php echo $ventadetalle->getCantidad(); ?></td> 
                    <td><?php echo $ventadetalle->getPrecio(); ?></td>
                    <td><?php echo $ventadetalle->getIva(); ?></td>                    
                                       
                    <td>
                        <a class='borrar' href='phpdelete.php?id=<?php echo $ventadetalle->getId(); ?>'>Borrar</a>
                        <a href='viewedit.php?id=<?php echo $ventadetalle->getId(); ?>'>Editar</a><br/>
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