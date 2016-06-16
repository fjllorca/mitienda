<?php

class Router {

    private $rutas = array();

    function __construct() {
        $this->rutas['principal'] = new Route('ModelWeb', 'ViewWeb', 'ControllerWeb');
        $this->rutas['op'] = new Route('ModelOp', 'ViewOp', 'ControllerOp');
        $this->rutas['usuario'] = new Route('ModelUsuario', 'ViewWeb', 'ControllerUsuario');
        $this->rutas['producto'] = new Route('ModelProducto', 'ViewWeb', 'ControllerProducto');
        
    }

    function getRoute($ruta) {
        if (!isset($this->rutas[$ruta])) {
            return $this->rutas['principal'];
        }
        return $this->rutas[$ruta];
    }

}
