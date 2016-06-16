<?php
require '../clases/AutoCarga.php';
$bd = new Database();
$gestor = new ManageCategoria($bd);

//¿Quién es el usuario que quiere insertar?
//Validación de datos (en servidor y cliente)
$id= Request::post("id");
$nombre= Request::post("nombre");
$categoria = new Categoria($id,$nombre);
$r = $gestor->set($categoria);
$bd->close();
header('Location:index.php?op=edit&r='.$r);
