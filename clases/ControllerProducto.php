<?php

class ControllerProducto extends Controller {

    function insertar() {
        $id = Request::post("id");
        $nombre = Request::post("nombre");
        $precio = Request::post("precio");
        $iva = Request::post("iva");
        $activo = Request::post("activo");
        $producto = new Producto($id, $nombre, $precio, $iva, $activo);
        $rinsercion = $this->getModelo()->doinsert($producto);
        if ($rinsercion === "-1") {
            $this->setData('contenido', '<h1> Error </h1>');
            $this->setData('precontenido', " ");
            $this->setData('postcontenido', " ");
        } else {
            //$this->setData('precontenido', " ");
            //$this->setData('postcontenido', " ");
            //$this->setData('contenido', '<h1></h1>');
            header('Location:index.php?ruta=producto&accion=listarproductos');
        }
        $this->setData('redireccion', '.?insertar=' . $rinsercion);
    }

    function editar() {
        $id = Request::post("id");
        $nombre = Request::post("nombre");
        $precio = Request::post("precio");
        $iva = Request::post("iva");
        $activo = Request::post("activo");
        $producto = new Producto($id, $nombre, $precio, $iva, $activo);
        $redicion = $this->getModelo()->doeditar($producto);
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

    function verinsertarProduto() {
        $this->setData('contenido', file_get_contents('theme/dpr/_insertarProducto.html'));
        $this->setData('precontenido', " ");
        $this->setData('postcontenido', " ");
    }

    function borrar() {
        $id = Request::req("id");
        $r = $this->getModelo()->dolistar();
        foreach ($r as $key => $value) {
            if ($value->getId() === $id) {
                if ($this->getModelo()->doborrar($id) === "0") {
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

    function listarproductos() {
        $irinsertar = "<a href='index.php?ruta=producto&accion=verinsertarProduto'>Insertar Comic </a>";
        $prueba = "
        <table border=2>
        <tr>
        <td>&nbsp;&nbsp;Id&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;Nombre&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;Precio&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;Iva&nbsp;&nbsp;</td>        
        <td>&nbsp;&nbsp;Acciones&nbsp;&nbsp;</td>
        <tr>";

        $t = "<tr>
                <td>{id}</td>
                <td>{nombre}</td>
                <td>{precio}</td>       
                <td>{iva}</td>       
                <td>
                    <a class='borrar' href='index.php?ruta=producto&accion=borrar&id={id}'>&nbsp;&nbsp;Borrar&nbsp;&nbsp;</a>
                    <a href='index.php?ruta=producto&accion=formularioProductos&id={id}'>&nbsp;&nbsp;Editar&nbsp;&nbsp;</a><br/>
                </td>
            </tr>";
        $final = "<a href='index.php?ruta=&'>Cancelar y volver pá ¡atrás!</a>";
        $r = $this->getModelo()->dolistar();
        $todo = "";
        foreach ($r as $key => $value) {
            $todo = str_replace('{id}', $value->getId(), $t);
            $todo = str_replace('{nombre}', $value->getNombre(), $todo);
            $todo = str_replace('{precio}', $value->getPrecio(), $todo);
            $todo = str_replace('{iva}', $value->getIva(), $todo);
            $prueba = $prueba . $todo;
        }
         $prueba = $prueba . "</table>";
        $this->setData("contenido", $prueba . $final);
        $this->setData('login', file_get_contents('theme/dpr/_logout.html'));
        $this->setData("postcontenido", "$irinsertar");
        $this->setData("precontenido", " ");
    }

    function listarproductosusuarios() {
        $prueba = "
        <table border=2>
        <tr>
        <td>&nbsp;&nbsp;Id&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;Nombre&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;Precio&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;Iva&nbsp;&nbsp;</td>
        <tr>";

        $t = "<tr>
        <td>{id}</td>
        <td>{nombre}</td>
        <td>{precio}</td>       
        <td>{iva}</td>
        <td>
                    <a  href='index.php?ruta=op&accion=docarrito&id={id}'>&nbsp;&nbsp;añadir carrito&nbsp;&nbsp;</a>
                    
                </td>
    </tr>";
        $final = "<a href='index.php?ruta=&'>Cancelar y volver pá ¡atrás!</a>";
        $r = $this->getModelo()->dolistar();
        $todo = "";
        foreach ($r as $key => $value) {
            $todo = str_replace('{id}', $value->getId(), $t);
            $todo = str_replace('{nombre}', $value->getNombre(), $todo);
            $todo = str_replace('{precio}', $value->getPrecio(), $todo);
            $todo = str_replace('{iva}', $value->getIva(), $todo);
            $prueba = $prueba . $todo;
        }
         $prueba = $prueba . "</table>";
        $this->setData("contenido", $prueba . $final);
        $this->setData('login', file_get_contents('theme/dpr/_logout.html'));
        $this->setData('carrito',  file_get_contents('theme/dpr/_carrito.html'));
        $this->setData("postcontenido", "");
        $this->setData("precontenido", "");
       
    }

    function formularioProductos() {
        $formulario = file_get_contents('theme/dpr/_editarProducto.html');
        $id = Request::req("id");
        if ($this->getSesion()->isLogged()) {
            $r = $this->getModelo()->dolistar();
            foreach ($r as $key => $value) {
                if ($value->getId() === $id) {
                    echo '<br><br>' . $value;
                    $formulario = str_replace('{id}', $value->getId(), $formulario);
                    $formulario = str_replace('{nombre}', $value->getNombre(), $formulario);
                    $formulario = str_replace('{precio}', $value->getPrecio(), $formulario);
                    $formulario = str_replace('{iva}', $value->getIva(), $formulario);
                }
            }
            $this->setData('contenido', $formulario);
            $this->setData('precontenido', " ");
            $this->setData('postcontenido', " ");
        }
    }
    
}
