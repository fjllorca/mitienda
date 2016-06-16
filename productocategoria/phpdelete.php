<?php
require '../clases/AutoCarga.php';
$bd = new Database();
$gestor = new ManageProductoCategoria($bd);
$Idproducto= Request::get("Idproducto");
$r = $gestor->delete($Idproducto);
$bd->close();
header('Location:index.php?op=delete&r='.$r);