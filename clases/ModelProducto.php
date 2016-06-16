<?php

class ModelProducto extends Model{

    function dolistar() {
        
        $bd = new Database();
        $gestor = new ManageProducto($bd);
        $page = Request::get('page');
        if ($page === null || $page === "") {
            $page = 1;
        }
        $registros = $gestor->count();
        $paginas = ceil($registros / Contants::NRPP); //ceil devuelve el primer entero >= que el numero que tengo
        $order = Request::get("order");
        $sort = Request::get("sort");
        $orden = "$order $sort";
//         $trozoEnlace="";
//        if(trim($orden)!=""){
//            $trozoEnlace="&order=$order&sort=$sort";
//        }
        $productos = $gestor->getList($page, trim($orden));
        //var_dump($usuarios);
        //echo $usuarios;
        return $productos;
      
    }
    function doinsert(Producto $producto) {
        //echo $usuario;
        $bd = new Database();
        $gestor = new ManageProducto($bd);
        $rproducto = $gestor->insert($producto);
        $bd->close();
        return $rproducto;
    }    
    function doeditar(Producto $producto) {
        //echo $usuario;
        $bd = new Database();
        $gestor = new ManageProducto($bd);
        $reditar = $gestor->set($producto);
        $bd->close();
        return $reditar;
    }
    function doborrar($id) {      
        $bd = new Database();
        $gestor = new ManageProducto($bd);        
        $rborrar = $gestor->delete($id);        
        return $rborrar;
        $bd->close();            
    }

}
