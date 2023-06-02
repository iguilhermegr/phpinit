<?php

require_once("../../database/connection.php");

$name = isset($_POST["name"]) ? $_POST["name"] : NULL;

if (!$name || $name == "") {
  header("Location: ../../@me/profile.php?error=Nome é obrigatório");
    exit;
}

$sql = ("SELECT * FROM `user`  WHERE `email` = :email AND `password` = :password");
$stmt = Db::connection()->prepare($sql);
$stmt->bindParam(":email", $email, PDO::PARAM_STR);
$stmt->bindParam(":password", $password, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user){
  session_start();
  $_SESSION["id"] = $user["id"];
  $_SESSION["name"] = $user["name"];
  $_SESSION["email"] = $user["email"];
  header("Location: ../../@me/dashboard.php");
  exit;
}else{
  header("Location: ../../index.php?error=Dados inválidos");
  exit;
}

