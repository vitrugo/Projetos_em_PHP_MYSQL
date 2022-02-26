<?php

$servidor = "localhost";
$usuario = "root";
$senha = "admin";
$dbname = "titansoftware";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conn)
{
  die("Falha". mysqli_connect_error());
}
?>


