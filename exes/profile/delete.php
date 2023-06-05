<?php

require_once("../../database/connection.php");

$id = isset($_GET["id"]) ? $_GET["id"] : NULL;

if (!$id || $id == "") {
  header("Location: ../../@me/profile?error=⁉ Perfil não encontrado");
  exit;
}

$sql = ("SELECT `id` FROM `user` WHERE `profile_id` = :profile_id");
$stmt = Db::connection()->prepare($sql);
$stmt->bindParam(":profile_id", $id, PDO::PARAM_INT);
$stmt->execute();
$exists = $stmt->rowCount();

if ($exists > 0) {
  header("Location: ../../@me/profile?error=⁉ Este perfil não pode ser deletado pois está em uso");
  exit;
} else {
  $deleteStmt = Db::connection()->prepare("DELETE FROM `profile` WHERE id = :id");
  $deleteStmt->bindParam(":id", $id, PDO::PARAM_INT);

  if ($deleteStmt->execute()) {
    header("Location: ../../@me/profile?success=🗑 Perfil excluído com sucesso");
    exit;
  } else {
    header("Location: ../../@me/profile?error=❎ Ocorreu um erro ao excluir o perfil");
    exit;
  }
}
