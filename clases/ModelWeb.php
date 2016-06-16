<?php

class ModelWeb extends Model {

    function __construct() {
        parent::__construct();
        $data = $this->getData();
        $data["titulo"] = "Mi Tienda";
        $data["base"] = Constants::BASE;
        $data["login"] = "";
        $data["precontenido"] = "";
        $data["contenido"] = "";
        $data["postcontenido"] = "";
        $data["usuario"] = "";
        $data["paneldeadministracion"] = "";
        $data["carrito"] = "";
        $this->setData($data);
    }
//    function doinsert(Usuario $usuario) {
//        //echo $usuario;
//        $bd = new Database();
//        $gestor = new ManageUsuario($bd);
//        $r = $gestor->insert($usuario);
//        $bd->close();
//    }
    
    
}