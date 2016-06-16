<?php
require '../clases/AutoCarga.php';
$bd = new Database();
$gestor = new ManageProducto($bd);

$id= Request::post("id");
$nombre= Request::post("nombre");
$precio= Request::post("precio");
$iva= Request::post("iva");
$activo= Request::post("activo");
$producto = new Producto($id,$nombre,$precio,$iva,$activo);
$r = $gestor->set($producto);
$bd->close();
header('Location:index.php?op=edit&r='.$r);
