<?php
require_once("../../database/connection.php");

$id = isset($_POST["id"]) ? $_POST["id"] : NULL;
$name = isset($_POST["name"]) ? $_POST["name"] : NULL;

if (!$id || $id == "") {
  header("Location: ../../@me/profession/edit.php?error=⁉ Perfil não encontrado para alterar");
  exit;
}

if (!$name || $name == "") {
  header("Location: ../../@me/profession/edit.php?id={$id}&error=🛑 Nome é obrigatório");
    exit;
}

$sql = ("UPDATE `profession` SET `name` = :name WHERE `id` = :id");
$stmt = Db::connection()->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->bindParam(":name", $name, PDO::PARAM_STR);

if($stmt->execute()){
  header("Location: ../../@me/profession/edit.php?id={$id}&success=📝 Perfil alterado com sucesso");
  exit;
}else{
  header("Location: ../../@me/profession/edit.php?id={$id}&error=❌ Ocorreu um erro ao cadastrar o perfil");
  exit;
}
