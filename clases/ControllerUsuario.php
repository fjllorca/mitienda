<?php

class ControllerUsuario extends Controller {

//    function principal() {
//        parent::principal();
//        $postcontenido = '';
//        $precontenido = '';
//        $contenido = '';
//        $precontenido = file_get_contents('theme/dpr/_index.html');
//        $this->setData('precontenido', $precontenido);
//        //$this->setData('contenido', '<h1>Usuario</h1>');
//        $this->setData('postcontenido', $postcontenido);
//    }

    function formularioUsuario() {
        $formulario = file_get_contents('theme/dpr/_editarUsuario.html');
        $correo = Request::req("correo");
        if ($this->getSesion()->isLogged()) {
            $r = $this->getModelo()->dolistar();
            foreach ($r as $key => $value) {
                if ($value->getCorreo() === $correo) {
                    $formulario = str_replace('{correo}', $value->getCorreo(), $formulario);
                    $formulario = str_replace('{clave}', $value->getClave(), $formulario);
                    $formulario = str_replace('{nombre}', $value->getNombre(), $formulario);
                    $formulario = str_replace('{apellidos}', $value->getApellidos(), $formulario);
                    $formulario = str_replace('{direccion}', $value->getDireccion(), $formulario);
                    $formulario = str_replace('{tipo}', $value->getTipo(), $formulario);
                    $formulario = str_replace('{activo}', $value->getActivo(), $formulario);
                    $formulario = str_replace('{fecha}', $value->getFecha(), $formulario);
                }
            }
            $this->setData('contenido', $formulario);
            $this->setData("postcontenido", " ");
            $this->setData("precontenido", " ");
        }
    }
    function editar() {
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
        $redicion = $this->getModelo()->doeditar($usuario);
        //echo $redicion;
        if ($redicion === "-1") {
            $this->setData('contenido', '<h1> Error </h1>');
        } else {
            $this->setData('contenido', file_get_contents('theme/dpr/_seleccionAdministradores.html'));
            $this->setData('precontenido', "<h1>EDITADO</h1> ");
            $this->setData('postcontenido', " ");
            //header('Location:index.php?ruta=producto&accion=listarproductos');
        }
        $this->setData('redireccion', '.?editar=' . $redicion);
    }
        
    function modificarmiUsuario() {
        $formulario = file_get_contents('theme/dpr/_editarUsuario.html');
        $usuario = $this->getSesion()->getUser();
        if ($this->getSesion()->isLogged()) {
            $formulario = str_replace('{correo}', $usuario->getCorreo(), $formulario);
            $formulario = str_replace('{clave}', $usuario->getClave(), $formulario);
            $formulario = str_replace('{nombre}', $usuario->getNombre(), $formulario);
            $formulario = str_replace('{apellidos}', $usuario->getApellidos(), $formulario);
            $formulario = str_replace('{direccion}', $usuario->getDireccion(), $formulario);
            $formulario = str_replace('{tipo}', $usuario->getTipo(), $formulario);
            $formulario = str_replace('{activo}', $usuario->getActivo(), $formulario);
            $formulario = str_replace('{fecha}', $usuario->getFecha(), $formulario);
            
            $this->setData('contenido', $formulario);
            $this->setData('login', file_get_contents('theme/dpr/_logout.html'));
            $this->setData("postcontenido", " ");
            $this->setData("precontenido", " ");
        }
    }
    
    function listarusuariosausuarios() {
        $prueba = "<table border=2><tr>
        <th>Correo</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Direccion</th>
        <th>Tipo</th>
        <th>Activo</th>
        <th>Fecha</th>                
        <tr>";
        if ($this->getSesion()->isLogged()) {

            $t = "<tr>
                    <td>{correo}</td>
                    <td>{nombre}</td>
                    <td>{apellidos}</td>
                    <td>{direccion}</td>
                    <td>{tipo}</td>   
                    <td>{activo}</td>
                    <td>{fecha}</td>   
                </tr>";
            $final="<a href='index.php?ruta=&'>Cancelar y volver pá ¡atrás!</a>";
            $r = $this->getModelo()->dolistar();
            $todo = "";
            foreach ($r as $key => $value) {
                $todo = str_replace('{correo}', $value->getCorreo(), $t);
                $todo = str_replace('{nombre}', $value->getNombre(), $todo);
                $todo = str_replace('{apellidos}', $value->getApellidos(), $todo);
                $todo = str_replace('{direccion}', $value->getDireccion(), $todo);
                $todo = str_replace('{tipo}', $value->getTipo(), $todo);
                $todo = str_replace('{activo}', $value->getActivo(), $todo);
                $todo = str_replace('{fecha}', $value->getFecha(), $todo);
                $prueba = $prueba . $todo;
            }
            $prueba = $prueba . "</table>";       
            $this->setData("contenido", $prueba.$final);
            $this->setData('login', file_get_contents('theme/dpr/_logout.html'));
            $this->setData("postcontenido", " ");
            $this->setData("precontenido", " ");
        }
    }
    
    function listarusuarios() {
        $prueba = "<table border=2><tr>
        <th>Correo</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Direccion</th>
        <th>Tipo</th>
        <th>Activo</th>        
        <th>Fecha</th>
        <th>Acción</th>
        <tr>";
        if ($this->getSesion()->isLogged()) {
            $t = "<tr>
                    <td>{correo}</td>
                    <td>{nombre}</td>
                    <td>$t{apellidos}</td>
                    <td>{direccion}</td>
                    <td>{tipo}</td>    
                    <td>{activo}</td>
                    <td>{fecha}</td>        
                    <td>
                        <a class='borrar' href='index.php?ruta=usuario&accion=borrar&correo={correo}'>Borrar</a>
                        <input name='correo' type='hidden' value='{correo}'>
                        <a href='index.php?ruta=usuario&accion=formularioUsuario&correo={correo}'>Editar</a><br/>
                    </td>
                </tr>";
            $final="<a href='index.php?ruta=&'>Cancelar y volver pá ¡atrás!</a>";
            $r = $this->getModelo()->dolistar();
            $todo = "";
            foreach ($r as $key => $value) {
                $todo = str_replace('{correo}', $value->getCorreo(), $t);
                $todo = str_replace('{nombre}', $value->getNombre(), $todo);
                $todo = str_replace('{apellidos}', $value->getApellidos(), $todo);
                $todo = str_replace('{direccion}', $value->getDireccion(), $todo);
                $todo = str_replace('{tipo}', $value->getTipo(), $todo);
                $todo = str_replace('{activo}', $value->getActivo(), $todo);
                $todo = str_replace('{fecha}', $value->getFecha(), $todo);
                $prueba = $prueba . $todo;
            }
            $prueba = $prueba . "</table>";      
            $this->setData("contenido", $prueba . $final);
            $this->setData('login', file_get_contents('theme/dpr/_logout.html'));
            $this->setData("postcontenido", " ");
            $this->setData("precontenido", " ");
        }
    }

    function borrar() {
        $correo = Request::req("correo");
        $r = $this->getModelo()->dolistar();
        foreach ($r as $key => $value) {
            if ($value->getCorreo() === $correo) {
                if ($this->getModelo()->doborrar($correo) === "0") {
                    $this->setData('contenido', '<h1> Error </h1>');
                } else {
                    $this->setData('login', file_get_contents('theme/dpr/_login.html'));
                    $this->setData('contenido', '');
                     $this->setData('postcontenido', file_get_contents('theme/dpr/_seleccionAdministradores.html'));
                    $this->setData('precontenido', 'BORRADO ');
                }
            }
        }
    }
    function logout(){
        $this->getSesion()->destroy(); 
        $this->setData('login', file_get_contents('theme/dpr/_login.html'));
        $this->setData('contenido', " ");
        $this->setData("postcontenido", " ");
        $this->setData("precontenido", " "); 
        $this->setData("carrito", " "); 
    }
    function vercarrito(){        
        $carrito = $this->getSesion()->getCarrito(); 
        $todo="";
        
        $vistacarrito="<table border=2><tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Iva</th>
            <th>Acción</th>
                </tr>";
      
        if ($this->getSesion()->isLogged()) {
            $t = "<tr>
                    <td>{nombre}</td>
                    <td>{precio}</td>
                    <td>{cantidad}</td>
                    <td>{iva}</td>    
                    <td><a href='index.php?ruta=usuario&accion=borrarlinea&id={id}'>Borrar</a></td>
                    <tr>";
              foreach ($carrito as $key => $value) {
            $todo = str_replace('{nombre}', $value->getProducto()->getNombre(), $t);
             $todo = str_replace('{id}', $value->getProducto()->getId(), $todo);
            $todo = str_replace('{precio}', $value->getProducto()-> getPrecio(), $todo);
            $todo = str_replace('{cantidad}', $value->getCantidad(), $todo);
            $todo = str_replace('{iva}', $value->getProducto() -> getIva(), $todo);
            $vistacarrito = $vistacarrito . $todo;
              }
              $vistacarrito = $vistacarrito . "</tabla>";
            $this->setData('contenido', $vistacarrito);
            $this->setData('login', file_get_contents('theme/dpr/_logout.html'));
            $this->setData('carrito',  file_get_contents('theme/dpr/_carrito.html'));
            $this->setData("postcontenido", " ");
            $this->setData("precontenido", " ");
        }
    }
    function borrarlinea(){
        $contenido="";
        $id = Request::req('$id');
        $carrito = $this->getSesion()->getCarrito();
        if (isset($carrito)){
            foreach ($carrito as $key => $value){
               if($id===$value->getProducto()->getId()){
                   $value->sub($value->getProducto());
                   $contenido="<h1>peoejeeehjm</h1>";
                   
               }
            }
        }
       // $contenido="<h1>peoejeeehjm</h1>";
        $this->setData('contenido', $contenido);
    }
    
    
}

