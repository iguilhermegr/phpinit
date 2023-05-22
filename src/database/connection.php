<?php
class Db{
  public static function connection(){
    $user= "root";
    $pass = "";
    $connection = new PDO("mysql:host=localhost;dbname=phpinit", $user, $pass);

    return $connection;
  }
}