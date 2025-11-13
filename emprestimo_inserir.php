<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimos :: Cadastrar</title>
    <?php
    include "referencias.php";
    ?>
</head>
<body>
    <?php
        $matricula_usuario = $_POST['matricula_usuario'];
        $isbn_livro = $_POST['isbn_livro'];
        $data_emprestimo = $_POST["data_emprestimo"];
        $data_devolucao_prevista = $_POST["data_devolucao_prevista"];
        $data_devolucao_real = $_POST["data_devolucao_real"];  
    
    //MONTAR COMANDO SQL

    $sql = "INSERT INTO 
    emprestimo(id_emprestimo, matricula_usuario, isbn_livro, data_emprestimo, data_devolucao_prevista, data_devolucao_real) 
    VALUES (?,?,?,?,?,?)";

    //PREPARAR COMANDO SQL PARA SER EXECUTADO E RELACIONAR O COMANDO QUE SERÁ EXECUTADO

    $comando = $conexao->prepare($sql);

    //VINCULAR OS ? COM AS VARIÁVEIS DE ENTRADA

    $comando->bind_param("iiisss", $id_emprestimo,
                                   $matricula_usuario,
                                   $isbn_livro,
                                   $data_emprestimo,
                                   $data_devolucao_prevista,
                                   $data_devolucao_real);
    
    //EXECUTAR COMANDO
    if ($comando->execute())
    {
        echo "<h1>Empréstimo feito!</h1>";
    }
    else
    {
        echo "<h1>Erro!</h1>";
    }

    $update = $conexao->prepare("UPDATE livro SET qtd_disponivel = qtd_disponivel - 1 WHERE isbn = ?");
    $update->bind_param("s", $isbn_livro);
    $update->execute(); 


    ?>
                        <a href="index.php">
                        <button type="button" class="btn btn-danger" name="btVoltar">Voltar</button>
                        </a>
</body>
</html>