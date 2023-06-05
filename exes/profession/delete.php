<?php

require_once("../../database/connection.php");

$id = isset($_GET["id"]) ? $_GET["id"] : NULL;

if (!$id || $id == "") {
  header("Location: ../../@me/profession?error=⁉ Profissão não encontrada");
  exit;
}

$sql = ("SELECT `user`.* FROM `user` JOIN `profession` t2 ON `user`.profession_id = t2.id WHERE `user`.profession_id = :id");
$stmt = Db::connection()->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() > 0) {
  header("Location: ../../@me/profession?error=⁉ Esta profissão não pode ser deletada pois está em uso");
  exit;
} else {
  $deleteStmt = Db::connection()->prepare("DELETE FROM `profession` WHERE id = :id");
  $deleteStmt->bindParam(":id", $id, PDO::PARAM_INT);
  
  if ($deleteStmt->execute()) {
    header("Location: ../../@me/profession?success=🗑 Profissão excluída com sucesso");
    exit;
  } else {
    header("Location: ../../@me/profession?error=❎ Ocorreu um erro ao excluir a profissão");
    exit;
  }
}
