<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário :: Cadastrar</title>
    <?php
    include "referencias.php";
    ?>
</head>
<body>
    <?php

    // RECEBENDO DADOS DO FORMULÁRIO
    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $tipo_usuario = $_POST["tipo_usuario"];
    $data_cadastro = $_POST["data_cadastro"];

    // MONTAR COMANDO SQL
    $sql = "INSERT INTO usuario (matricula, nome, email, tipo_usuario, data_cadastro)
            VALUES (?, ?, ?, ?, ?)";

    // PREPARAR COMANDO SQL PARA SER EXECUTADO
    $comando = $conexao->prepare($sql);

    // VINCULAR OS ? COM AS VARIÁVEIS DE ENTRADA
    $comando->bind_param("sssss", $matricula, $nome, $email, $tipo_usuario, $data_cadastro);
    
    // EXECUTAR COMANDO
    if ($comando->execute()) {
        echo "<h1 class='alert alert-success'>Usuário cadastrado com sucesso!</h1>";
    } else {
        echo "<h1 class='alert alert-danger'>Erro ao cadastrar usuário!</h1>";
    }

    // FECHAR COMANDO E CONEXÃO
    $comando->close();
    $conexao->close();

    ?>
                        <a href="index.php">
                        <button type="button" class="btn btn-danger" name="btVoltar">Voltar</button>
                        </a>
</body>
</html>