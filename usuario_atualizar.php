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

    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $tipo_usuario = $_POST["tipo_usuario"];
    $data_cadastro = date("d-m-y");


    // Prepara a instrução SQL
    // Os '?' são parametros para os dados
    $sql = "UPDATE usuario SET nome = ?, email = ?, tipo_usuario = ?, data_cadastro = ? WHERE matricula = ?";

    // Prepara o comando
    $comando = $conexao->prepare($sql);

    
    // Vincula os parâmetros à instrução
    // 's' significa string, 'i' significa integer, 'd' significa double
    // O número de 's's deve corresponder ao número de '?'s
    $comando->bind_param("ssssi", $nome, $email, $tipo_usuario, $data_cadastro,$matricula);

    // Executa o statement
    if ($comando->execute()) {
        echo "<h1 class='alert alert-success'>Tarefa atualizada com sucesso!</h1>";
    } else {
        echo "<h1 class='alert alert-danger'>Erro ao atualizar a tarefa:</h1> " ;
    }

    // Fecha o statement e a conexão
    $comando->close();
    $conexao->close();
    ?>
</body>

</html>