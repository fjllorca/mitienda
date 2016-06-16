<?php

require '../clases/Autoload.php';
$bd = new Database();
$gestor = new ManageUsuario($bd);

$correo= Request::post("email");
$clave= Request::post("clave");
$nombre= Request::post("nombre");
$apellidos= Request::post("apellidos");
$direccion= Request::post("direccion");
$tipo= Request::post("tipo");
$activo= Request::post("activo");
$fecha= Request::post("fecha");
$usuario = new Usuario($correo,$clave,$nombre,$apellidos,$direccion,$tipo,$activo,$fecha);
$r = $gestor->insert($usuario);
$bd->close();
//header('Location:index.php?op=insert&r='.$r);
