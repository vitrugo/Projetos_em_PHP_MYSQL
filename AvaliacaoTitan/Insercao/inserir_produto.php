<?php

  include('../conn/conexao.php');

  if($_POST){
    $nome = $_POST["NOME"];
    $cor = $_POST["COR"];
    $preco = $_POST["PRECO"];


    $bdd = "INSERT INTO produtos (NOME, COR) values ('$nome','$cor')";

    if($conn->query($bdd) === TRUE) { 
      
      if(strtoupper($cor) == 'VERMELHO' && $preco > 50.00 ){
        $pctm = 5.00;
        $preco = $preco - ($preco / 100 * $pctm);        
      } elseif (strtoupper($cor) == 'AMARELO') {
        $pctm = 10.00;
        $preco = $preco - ($preco / 100 * $pctm);
      } else if (strtoupper($cor) == 'AZUL' ||  $cor == 'VERMELHO' ) {
        $pctm = 20.00;
        $preco = $preco - ($preco / 100 * $pctm); 
      }

      $id=$conn->insert_id;
      $bddpreco = "INSERT INTO preco (IDPROD, PRECO) VALUES ('$id' , '$preco')";

      if($conn->query($bddpreco) === TRUE) {
        echo "  <script>alert('Inserido com Sucesso!');</script>";
        echo "<a href='../index.php'><button type='button'>Voltar</button></a>";
      } else {
        echo "Error " . $bdd . ' ' . $conn->connect_error;
      }
    }  

    $conn->close();
  }
?>

