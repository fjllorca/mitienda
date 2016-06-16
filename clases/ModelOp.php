<?php

class ModelOp extends Model {

    function doLogin($email, $password) {
        $bd = new Database();
        $gestor = new ManageUsuario($bd);
        $objSe = new Session;
//        $objSe->init();
//        $objSe->set('loginsesion', $loginbase);			
//        $objSe->set('profilesesion', $profile);
        $user = $gestor->get($email);
        $emailbase = $user->getCorreo();
        $passbase = $user->getClave();


//        echo 'Entrada de parámetros a la Función doLogin desde ControllerUsuario ';
//        echo "<br>emil mandado como parámetro al metodo:$email";
//        echo "<br>password mandado como parámetro al metodo:$password<br>";
//        echo "<br>emilbasedatos:<br>$emailbase<br>";
//        echo "passwordbasedatos:<br>$passbase<br>";

        if ($email === null && $password === null) {
            return false;
        }
        if ($emailbase === $email && $passbase === $password) {
            //echo "devuelve . '$usuario'. <br>";
            return $user;
        }
        echo ('devuelve false');
        return false;
    }
    function dolistar(){
        $usuario = $this->getSesion()->getCarrito();
    } 
    function doinsert(Usuario $usuario) {
        //echo $usuario;
        $bd = new Database();
        $gestor = new ManageUsuario($bd);
        $r = $gestor->insert($usuario);
        $bd->close();
        return $r;
    }    
//    function doeditar(Usuario $usuario) {
//        //echo $usuario;
//        $bd = new Database();
//        $gestor = new ManageUsuario($bd);
//        $r = $gestor->set($usuario);
//        $bd->close();
//        return $r;
//    }
    function doLogout(){
        var_dump($user);
        echo 'hola';
        
    }
    function docomprar($id) {
        $carrito = new Carrito();
        $bd = new Database();
        $gestor = new ManageProducto($bd);
        $r = $gestor->getList();
        foreach ($r as $key => $value){
            if($value->getId()===$id){
                $carrito->add($value);
                
            }
        }
        
    }
    
}

   

