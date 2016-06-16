<?php

class ControllerOp extends Controller {

    function login() {
        $correo = Request::req("correo");
        $password = Request::req("password");
        $r = $this->getModelo()->doLogin($correo, $password);
        if ($r === false) {
            $this->getSesion()->destroy();
            $this->setData('redireccion', '.?login=fail');
        } else {
            $this->getSesion()->setUser($r);
            $this->setData('redireccion', '.?login=ok');
        }
    }

    function insertar() {
        $correo = Request::post("email");
        $clave = Request::post("clave");
        $nombre = Request::post("nombre");
        $apellidos = Request::post("apellidos");
        $direccion = Request::post("direccion");
        $tipo = Request::post("tipo");
        $activo = Request::post("activo");
        $fecha = Request::post("fecha");
        $usuario = new Usuario($correo, $clave, $nombre, $apellidos, $direccion, $tipo, $activo, $fecha);
        //echo $usuario;
        $rinsercion = $this->getModelo()->doinsert($usuario);
        $this->setData('redireccion', '.?insertar=' . $rinsercion);
    }
//    function editar() {
//        $correo = Request::post("email");
//        $clave = Request::post("clave");
//        $nombre = Request::post("nombre");
//        $apellidos = Request::post("apellidos");
//        $direccion = Request::post("direccion");
//        $tipo = Request::post("tipo");
//        $activo = Request::post("activo");
//        $fecha = Request::post("fecha");
//        $usuario = new Usuario($correo, $clave, $nombre, $apellidos, $direccion, $tipo, $activo, $fecha);
//        //echo $usuario;
//        $redicion = $this->getModelo()->doeditar($usuario);
//        echo $redicion;
//        if ($redicion==="-1"){ 
//            $this->setData('contenido', '<h1> Error </h1>');
//                } else {
//                    header('Location:index.php?ruta=usuarios&accion=listarusuarios');
//                   
////                    $this->setData('contenido', file_get_contents('theme/dpr/_seleccionAdministradores.html'));                    
////                    $this->setData('precontenido', '¡MODIFICADO CORRECTO!');
////                    $this->setData('postcontenido', '');
////                   
//                }
//        $this->setData('redireccion', '.?editar=' . $redicion);
   // }
   
    function docarrito(){
        $id = Request::req("id");
        $r = $this->getModelo()->docomprar($id);
         $this->setData('redireccion', '.?ruta=producto&accion=listarproductosusuarios');
    }
    

    function principal() {
        $this->setData('redireccion', '.');
    }
    

}
