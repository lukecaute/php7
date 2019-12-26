<?php
require_once("config.php");

$usuario = new Usuario();
//$usuario->loadById(2);

//$lista = Usuario::getList();
//$search = Usuario::search("mar");

$usuario->login("root","!@#$%");
echo $usuario;
?>