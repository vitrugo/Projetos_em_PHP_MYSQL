<!DOCTYPE html>
<html lang="en">

<head>
    <h1>Titan Software</h1>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
</head>

<body>
    <div>

        <p>
        <form action="<?php $_SERVER['PHP_SELF'] ?>">
            Nome: <input type="text" name="nome" /> </br>
            Cor: &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cor" /> </br>
            Preco: &nbsp;<input type="text" name="preco" />
            <select name="tipoPreco">
                <option value=">">&nbsp;&nbsp; > &nbsp;&nbsp;</option>
                <option value="=" selected>&nbsp;&nbsp; = &nbsp;&nbsp;</option>
                <option value="<">&nbsp;&nbsp; < &nbsp;&nbsp;</option>
            </select>
            </br></br>
            <input type="submit" value="Filtrar" />
        </form>
        </p>

        </br></br>

        <form action="<?php $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Limpar Filtro" />
        </form>

        </br></br>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>COR</th>
                    <th>PRECO</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include('conn/conexao.php');

                $nome = filter_input(INPUT_GET, "nome");
                $cor = filter_input(INPUT_GET, "cor");
                $preco = filter_input(INPUT_GET, "preco");
                $tipoPreco = filter_input(INPUT_GET, "tipoPreco");

                $bdd = "SELECT * from produtos p join preco pr on (p.IDPROD=pr.IDPROD)  ";

                if ($nome || $cor || $preco) {
                    $bdd .= " WHERE ";

                    if ($nome) $bdd .= 'p.nome like "%' . $nome . '%" ,';
                    if ($cor) {
                        if (strpos($bdd, ",")) {
                            $bdd = substr($bdd, 0, -1);
                            $bdd .= " and ";
                        }
                        $bdd .= 'p.cor = "' . strtoupper($cor) . '" ,';
                    }
                    if ($preco) {
                        if (strpos($bdd, ",")) {
                            $bdd = substr($bdd, 0, -1);
                            $bdd .= " and ";
                        }
                        $bdd .= 'pr.preco ' . $tipoPreco . ' ' . $preco . ' ';
                    }
                    if (strpos($bdd, ",")) {
                        $bdd = substr($bdd, 0, -1);
                    }
                }

                $result = $conn->query($bdd);


                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['IDPROD'] . "</td>";
                    echo "<td>" . $user_data['NOME'] . "</td>";
                    echo "<td>" . $user_data['COR'] . "</td>";
                    echo "<td>R$" . $user_data['PRECO'] . "</td>";
                    echo '<td><a href="Atualizacao/index_atualizar_produto.php?id=' . $user_data['IDPROD'] . '">Atualizar</a></td>';
                    echo '<td><a href="Exclusao/excluir_produto.php?ID=' . $user_data['IDPROD'] . '">Excluir</a></td>';
                    echo "</tr>";
                }
                $conn->close();
                ?>

            </tbody>
        </table>
    </div>

    <div>
        <br>
        <button type="button" onclick="EventoInserir()">Inserir</button>
    </div>
</body>
<script>
    function EventoInserir() {
        window.location.href = "Insercao/index_inserir_produto.php"
    }
</script>

</script>

</html>