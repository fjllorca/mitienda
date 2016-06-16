<?php

require '../clases/AutoCarga.php';
$bd = new Database();
$gestor = new ManageVentaDetalle($bd);

$id= Request::post("id");
$idventa= Request::post("idventa");
$idproducto= Request::post("idproducto");
$cantidad= Request::post("cantidad");
$precio= Request::post("precio");
$iva= Request::post("iva");

$ventadetalle = new VentaDetalle($id,$idventa,$idproducto,$cantidad,$precio,$iva);
$r = $gestor->insert($ventadetalle);
$bd->close();
header('Location:index.php?op=insert&r='.$r);
