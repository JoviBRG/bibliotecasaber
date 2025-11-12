<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro :: Cadastrar</title>
    <?php
    include "referencias.php";
    ?>
</head>
<body>
    <?php

    $isbn = $_POST["isbn"];
    $titulo = $_POST["titulo"];
    $ano_publicacao = $_POST["anoPublicacao"];
    $editora = $_POST["editora"];
    $qtd_total = $_POST['qtdTotal'];
    $qtd_disponivel = $_POST['qtdDisponivel'];
    
    //MONTAR COMANDO SQL

    $sql = "INSERT INTO livro(isbn, titulo, ano_publicacao, editora, qtd_total, qtd_disponivel) VALUES (?,?,?,?,?,?)";

    //PREPARAR COMANDO SQL PARA SER EXECUTADO E RELACIONAR O COMANDO QUE SERÁ EXECUTADO

    $comando = $conexao->prepare($sql);

    //VINCULAR OS ? COM AS VARIÁVEIS DE ENTRADA

    $comando->bind_param("ssisii", $isbn,$titulo,$ano_publicacao,$editora,$qtd_total,$qtd_disponivel);
    
    //EXECUTAR COMANDO
    if ($comando->execute())
    {
        echo "<h1>Livro cadastrado</h1>";
    }
    else
    {
        echo "<h1>Erro!</h1>";
    }

    ?>
</body>
</html>