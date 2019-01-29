<?php 

require_once("config.php");

/*
$sql = new Sql();

$usuarios = $sql->select("Select * from tb_usuarios");

echo json_encode($usuarios);
*/
//Carrega um usuário
// $root = new Usuarios();

//$root->loadbyId(3);

//echo $root;
//
//Carrega uma lista de usuários

//$lista = Usuario::getList();

//echo json_encode($lista);

//Carrega uma lista de usuários buscando pelo Login

//$search = Usuario::search("jo");
//
//echo json_encode($search);

$usuario = new Usuario();
$usuario->login("root","123456");

echo $usuario;


 ?>