<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Inserir</title>
    <?php
    include "referencias.php";
    ?>
</head>
<body>
    <?php

    $descricao = $_POST["txtDescricao"];
    $data_entrega = $_POST["txtData"];
    $prioridade = $_POST["txtPrioridade"];
    $responsavel = $_POST["txtResponsavel"];
    
    //MONTAR COMANDO SQL

    $sql = "INSERT INTO tarefa(descricao, data_entrega,prioridade,responsavel) VALUES (?,?,?,?)";

    //PREPARAR COMANDO SQL PARA SER EXECUTADO E RELACIONAR O COMANDO QUE SERÁ EXECUTADO

    $comando = $conexao->prepare($sql);

    //VINCULAR OS ? COM AS VARIÁVEIS DE ENTRADA

    $comando->bind_param("ssss", $descricao,$data_entrega,$prioridade,$responsavel);
    
    //EXECUTAR COMANDO
    if ($comando->execute())
    {
        echo "<h1>Tarefa Agendada<\h1>";
    }
    else
    {
        echo "<h1>Erro!<\h1>";
    }

    ?>
</body>
</html>