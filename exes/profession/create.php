<?php

require_once("../../database/connection.php");

$name = isset($_POST["name"]) ? $_POST["name"] : NULL;

if (!$name || $name == "") {
  header("Location: ../../@me/profession?error=Nome é obrigatório");
  exit;
}

$sql = ("INSERT INTO `profession` (`name`) VALUES (:name)");
$stmt = Db::connection()->prepare($sql);
$stmt->bindParam(":name", $name, PDO::PARAM_STR);

if($stmt->execute()){
  header("Location: ../../@me/profession?success=✅ Profissão cadastrada com sucesso");
  exit;
}else{
  header("Location: ../../@me/profession?error=❎ Ocorreu um erro ao cadastrar a profissão");
  exit;
}

