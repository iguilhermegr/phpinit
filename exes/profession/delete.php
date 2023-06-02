<?php

require_once("../../database/connection.php");

$id = isset($_GET["id"]) ? $_GET["id"] : NULL;

if (!$id || $id == "") {
  header("Location: ../../@me/profession?error=⁉ Profissão não encontrada");
  exit;
}

$sql = ("DELETE FROM `profession` WHERE `id` = :id");
$stmt = Db::connection()->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);

if($stmt->execute()){
  header("Location: ../../@me/profession?success=🗑 Profissão excluída com sucesso");
  exit;
}else{
  header("Location: ../../@me/profession?error=❎ Ocorreu um erro ao excluir o profissão");
  exit;
}

