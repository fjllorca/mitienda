<?php

class Producto extends TableObject{
    protected $id,$nombre,$precio,$iva;
    function __construct($id=null, $nombre=null, $precio=null, $iva=null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->iva = $iva;
       
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getIva() {
        return $this->iva;
    }

    
    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setIva($iva) {
        $this->iva = $iva;
    }

   


}
