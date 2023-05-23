<?php

require_once("../../database/connection.php");

$id = isset($_GET["id"]) ? $_GET["id"] : NULL;

if (!$id || $id == "") {
    header("Location: ../../@me/profile.php?error=Perfil não encontrado");
    exit;
}

$sql = ("DELETE FROM `profile` WHERE `id` = :id");
$stmt = Db::connection()->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);

if($stmt->execute()){
  header("Location: ../../@me/profile.php?success=Perfil excluído com sucesso");
  exit;
}else{
  header("Location: ../../@me/profile.php?error=Ocorreu um erro ao excluir o perfil");
  exit;
}

