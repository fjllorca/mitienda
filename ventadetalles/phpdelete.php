<?php
require '../clases/AutoCarga.php';
$bd = new Database();
$gestor = new ManageVentaDetalle($bd);
$id= Request::get("id");
$r = $gestor->delete($id);
$bd->close();
header('Location:index.php?op=delete&r='.$r);