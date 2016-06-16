<?php

require '../clases/AutoCarga.php';
$bd = new Database();
$gestor = new ManageProductoCategoria($bd);

$idproducto= Request::post("idproducto");
$idcategoria= Request::post("idcategoria");


$productocategoria = new ProductoCategoria($idproducto,$idcategoria);
$r = $gestor->insert($productocategoria);
$bd->close();
header('Location:index.php?op=insert&r='.$r);
