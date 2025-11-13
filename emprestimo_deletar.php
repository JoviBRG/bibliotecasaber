<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo :: Deletar</title>

    <?php
    include "referencias.php"
        ?>
</head>

<body>
    <br>
    <?php

    $id_emprestimo = $_POST["id_emprestimo"];

   
    // Prepara a instrução SQL
    // Os '?' são parametros para os dados
    $sql = "DELETE FROM emprestimo WHERE id_emprestimo = ?";

    // Prepara o comando
    $comando = $conexao->prepare($sql);


     // Vincula o parâmetro à instrução
    // 'i' significa integer, pois o ID é um número inteiro
    $comando->bind_param("i", $id_emprestimo);

    
    // Executa o statement
    if ($comando->execute()) {
        echo "<h1 class='alert alert-success'>Livro excluído com sucesso!</h1>";
    } else {
        echo "<h1 class='alert alert-danger'>Erro ao remover o livro.</h1> "; 
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