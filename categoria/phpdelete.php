<?php
require '../clases/AutoCarga.php';
$bd = new Database();
$gestor = new ManageCategoria($bd);
$id= Request::get("id");
$r = $gestor->delete($id);
echo ($id);
$bd->close();
header('Location:index.php?op=delete&r='.$r);