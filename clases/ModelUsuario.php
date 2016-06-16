<?php

class ModelUsuario extends Model {

    function dolistar() {
        
        $bd = new Database();
        $gestor = new ManageUsuario($bd);
        $page = Request::get('page');
        if ($page === null || $page === "") {
            $page = 1;
        }
        $registros = $gestor->count();
        $paginas = ceil($registros / Contants::NRPP); //ceil devuelve el primer entero >= que el numero que tengo
        $order = Request::get("order");
        $sort = Request::get("sort");
        $orden = "$order $sort";

        $usuarios = $gestor->getList($page, trim($orden));
        //var_dump($usuarios);
        //echo $usuarios;
        return $usuarios;
      
    }
    function doborrar($correo) {      
        $bd = new Database();
        $gestor = new ManageUsuario($bd);        
        $rborrar = $gestor->delete($correo);        
        return $rborrar;
        $bd->close();            
    }
    function doeditar(Usuario $usuario) {
        //echo $usuario;
        $bd = new Database();
        $gestor = new ManageUsuario($bd);
        $r = $gestor->set($usuario);
        return $r;
        $bd->close();
        
    }
    
    function doLogout(){
        var_dump($user);
        echo 'hola';
        
    }
     

}
 
