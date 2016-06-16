<?php
require '../clases/AutoCarga.php';
$bd = new Database();
$gestor = new ManageVenta($bd);

$id= Request::post("id");
$correo= Request::post("correo");
$fecha= Request::post("fecha");
$pagado= Request::post("pagado");

$venta = new Venta($id,$correo,$fecha,$pagado);
$r = $gestor->set($venta);
$bd->close();
header('Location:index.php?op=edit&r='.$r);
