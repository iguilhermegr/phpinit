<?php

require_once("../../database/connection.php");

$name = isset($_POST["name"]) ? $_POST["name"] : NULL;
$email = isset($_POST["email"]) ? $_POST["email"] : NULL;
$profile_id = isset($_POST["profile_id"]) ? $_POST["profile_id"] : NULL;
$profession_id = isset($_POST["profession_id"]) ? $_POST["profession_id"] : NULL;

if (!$name || $name == "") {
  header("Location: ../../@me/user.php?error=Nome é obrigatório");
  exit;
}

if (!$profile_id || !$profession_id) {
  header("Location: ../../@me/user.php?error=Perfil e profissão são obrigatórios");
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
  header("Location: ../../@me/profile.php?error=❎ Ocorreu um erro ao cadastrar o usuário");
  exit;
}