<?php

  include('../conn/conexao.php');
  
    $nome = $_POST["NOME"];
    $preco = $_POST["PRECO"];
    $id = $_POST['id'];

    $bdd2 = "UPDATE produtos SET NOME = '$nome' WHERE IDPROD = '$id'"; 
    

    if($conn->query($bdd2) === TRUE) {

      $bddpreco2 = "UPDATE preco SET PRECO = '$preco' WHERE IDPROD = '$id'";

      if($conn->query($bddpreco2) === TRUE) {
        echo "  <script>alert('Atualizado com Sucesso!');</script>";
        echo "<a href='../index.php'><button type='button'>Voltar</button></a>";
      } else {
        echo "Error " . $bdd2 . ' ' . $conn->connect_error;
      }
    }  
    $conn->close();
  
?>