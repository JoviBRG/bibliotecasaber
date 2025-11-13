<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro :: Atualizar</title>

    <?php
    include "referencias.php"
        ?>
</head>

<body>
    <br>
    <?php

    $isbn = $_POST["isbn"];
    $titulo =  $_POST["titulo"];
    $ano_publicacao =  $_POST["ano_publicacao"];
    $editora =  $_POST["editora"];
    $qtd_total =  $_POST["qtd_total"];
    $qtd_disponivel =  $_POST["qtd_disponivel"];

    // Prepara a instrução SQL
    // Os '?' são parametros para os dados
    $sql = "UPDATE livro SET titulo = ?, ano_publicacao = ?, editora = ?, qtd_total = ?, qtd_disponivel = ? WHERE isbn = ?";

    // Prepara o comando
    $comando = $conexao->prepare($sql);

    
    // Vincula os parâmetros à instrução
    // 's' significa string, 'i' significa integer, 'd' significa double
    // O número de 's's deve corresponder ao número de '?'s
    $comando->bind_param("sisiii", $titulo, $ano_publicacao, $editora, $qtd_total,$qtd_disponivel,$isbn);

    // Executa o statement
    if ($comando->execute()) {
        echo "<h1 class='alert alert-success'>Livro atualizado com sucesso!</h1>";
    } else {
        echo "<h1 class='alert alert-danger'>Erro ao atualizar o livro:</h1> " ;
    }

    // Fecha o statement e a conexão
    $comando->close();
    $conexao->close();
    ?>
                        <a href="index.php">
                        <button type="button" class="btn btn-danger" name="btVoltar">Voltar</button>
                        </a>
</body>

</html>