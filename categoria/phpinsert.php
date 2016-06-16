<?php

require '../clases/AutoCarga.php';
$bd = new Database();
$gestor = new ManageCategoria($bd);


$id= Request::post("id");
$nombre= Request::post("nombre");
$categoria = new Categoria($id,$nombre);
$r = $gestor->insert($categoria);
$bd->close();
header('Location:index.php?op=insert&r='.$r);
