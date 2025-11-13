<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo :: Atualizar</title>

    <?php
    include "referencias.php"
        ?>
</head>

<body>
    <br>
    <?php

    $id_emprestimo = $_POST["id_emprestimo"];
    $data_devolucao_real = $_POST["data_devolucao_real"];
    $isbn_livro = $_POST["isbn_livro"];

    // Prepara a instrução SQL
    // Os '?' são parametros para os dados
    $sql = "UPDATE emprestimo SET data_devolucao_real = ? WHERE id_emprestimo = ?";

    // Prepara o comando
    $comando = $conexao->prepare($sql);

    
    // Vincula os parâmetros à instrução
    // 's' significa string, 'i' significa integer, 'd' significa double
    // O número de 's's deve corresponder ao número de '?'s
    $comando->bind_param("si", $data_devolucao_real, $id_emprestimo);

    // Executa o statement
    if ($comando->execute()) {
        echo "<h1 class='alert alert-success'>Devolução registrada e livro reposto com sucesso!</h1>";
    }

    $update = $conexao->prepare("UPDATE livro SET qtd_disponivel = qtd_disponivel + 1 WHERE isbn = ?");
    $update->bind_param("s", $isbn_livro);
    $update->execute();

    // Fecha o statement e a conexão
    $comando->close();
    $conexao->close();
    ?>
                        <a href="index.php">
                        <button type="button" class="btn btn-danger" name="btVoltar">Voltar</button>
                        </a>
</body>

</html>