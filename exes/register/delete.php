<?php

require_once("../../database/connection.php");

$id = isset($_GET["id"]) ? $_GET["id"] : NULL;

if (!$id || $id == "") {
  header("Location: ../../@me/user?error=⁉ Usuário não encontrada");
  exit;
}

$sql = ("DELETE FROM `user` WHERE `id` = :id");
$stmt = Db::connection()->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);

if($stmt->execute()){
  header("Location: ../../@me/user?success=🗑 Usuário excluído com sucesso");
  exit;
}else{
  header("Location: ../../@me/user?error=❎ Ocorreu um erro ao excluir o usuário");
  exit;
}