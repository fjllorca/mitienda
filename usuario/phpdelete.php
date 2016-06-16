<?php
require '../clases/Autoload.php';
$bd = new Database();
$gestor = new ManageUsuario($bd);
$correo= Request::get("correo");
$r = $gestor->delete($correo);
$bd->close();
header('Location:index.php?op=delete&r='.$r);