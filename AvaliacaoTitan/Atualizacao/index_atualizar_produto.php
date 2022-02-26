<!DOCTYPE html>
<html>
<div>
	<h1>Atualizar Produto</h1>
	<form method="POST" action="./atualizar.php">
		Nome: <input type="text" name="NOME" placeholder="Nome do Produto"><br><br>
		Preco: <input type="text" name="PRECO" placeholder="Valor do Produto"><br><br>
		<input	hidden	 type="text" name="id" value= "<?php echo $_GET['id']?> ">
		<input type="submit" value="Atualizar">
	</form>
</div>

</html>