<?php

require_once("../../database/connection.php");

function cleanPost($valor){
  $valor = trim($valor); //limpa espaços vazio
  $valor = stripslashes($valor); //remove barras
  $valor = htmlspecialchars($valor); //remove/converte alguns caracteres predefinidos em entidades HTML.
  return $valor;
}

$name = isset($_POST["name"]) ? cleanPost($_POST["name"]) : NULL;
$email = isset($_POST["email"]) ? cleanPost($_POST["email"]) : NULL;
$profile_id = isset($_POST["profile_id"]) ? cleanPost($_POST["profile_id"]) : NULL;
$profession_id = isset($_POST["profession_id"]) ? cleanPost($_POST["profession_id"]) : NULL;

if (!$name || $name == "") {
  header("Location: ../../@me/user?error=Nome é obrigatório");
  exit;
}

if (!$profile_id || !$profession_id) {
  header("Location: ../../@me/user?error=Perfil e profissão são obrigatórios");
  exit;
}

$sql = "INSERT INTO `user` (`name`, `email`,`profile_id`, `profession_id`) VALUES (:name, :email, :profile_id, :profession_id)";
$stmt = Db::connection()->prepare($sql);
$stmt->bindParam(":name", $name, PDO::PARAM_STR);
$stmt->bindParam(":email", $email, PDO::PARAM_STR);
$stmt->bindParam(":profile_id", $profile_id, PDO::PARAM_INT);
$stmt->bindParam(":profession_id", $profession_id, PDO::PARAM_INT);

if($stmt->execute()){
  header("Location: ../../@me/user?success=✅ Usuário cadastrado com sucesso");
  exit;
}else{
  header("Location: ../../@me/user?error=❎ Ocorreu um erro ao cadastrar o usuário");
  exit;
}
