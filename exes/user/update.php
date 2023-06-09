<?php
require_once("../../database/connection.php");

$id = isset($_POST["id"]) ? $_POST["id"] : NULL;
$name = isset($_POST["name"]) ? $_POST["name"] : NULL;
$email = isset($_POST["email"]) ? $_POST["email"] : NULL;
$profile_id = isset($_POST["profile_id"]) ? $_POST["profile_id"] : NULL;
$profession_id = isset($_POST["profession_id"]) ? $_POST["profession_id"] : NULL;

if (!$id || $id == "") {
  header("Location: ../../@me/user?error=⁉ Perfil não encontrado para alterar");
  exit;
}

if (!$name || $name == "") {
  header("Location: ../../@me/user/edit.php?id={$id}&error=🛑 Nome é obrigatório");
  exit;
}
if (!$email || $email == "") {
  header("Location: ../../@me/user/edit.php?id={$id}&error=🛑 Email é obrigatório");
  exit;
}
if (!$profile_id || $profile_id == "") {
  header("Location: ../../@me/user/edit.php?id={$id}&error=🛑 Perfil é obrigatório");
  exit;
}
if (!$profession_id || $profession_id == "") {
  header("Location: ../../@me/user/edit.php?id={$id}&error=🛑 Profissão é obrigatório");
  exit;
}

$sql = "UPDATE `user` SET `name` = :name, `email` = :email, `profile_id` = :profile_id, `profession_id` = :profession_id WHERE `id` = :id";
$stmt = Db::connection()->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->bindParam(":name", $name, PDO::PARAM_STR);
$stmt->bindParam(":email", $email, PDO::PARAM_STR);
$stmt->bindParam(":profile_id", $profile_id, PDO::PARAM_STR);
$stmt->bindParam(":profession_id", $profession_id, PDO::PARAM_STR);

if($stmt->execute()){
  header("Location: ../../@me/user/edit.php?id={$id}&success=📝 Usuário alterado com sucesso");
  exit;
}else{
  header("Location: ../../@me/user/edit.php?id={$id}&error=❌ Ocorreu um erro ao cadastrar o usuário");
  exit;
}
