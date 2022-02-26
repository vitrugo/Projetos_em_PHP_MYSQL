<?php 
 
    include('../conn/conexao.php');
    
    $sql = "DELETE FROM produtos WHERE IDPROD = '".$_GET['ID']."'";

        if($conn->query($sql) === TRUE) {
            echo "<p>Removido com Sucesso!!</p>";
            echo "<a href='../index.php'><button type='button'>Home</button></a>";
        } else {
            echo "Error updating record : " . $conn->error;
        }
    
    $conn->close();
 
?>