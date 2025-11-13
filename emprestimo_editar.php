<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro :: Editar</title>
    <?php
    include "referencias.php";
    ?>
</head>

<body>
    <br>
    <?php
    include "conexao_bd.php"; // certifica-se de incluir sua conexão com o banco

    $id_emprestimo = "";
    $matricula_usuario = "";
    $isbn_livro = "";
    $data_emprestimo = "";
    $data_devolucao_prevista = "";
    $data_devolucao_real = ""; 
    // O ID do registro que você quer buscar
    $id_emprestimo = $_POST["txtID"];
    
    // Prepara a instrução SQL com um placeholder '?'
    $sql = "SELECT * FROM emprestimo WHERE id_emprestimo = ?";

    // Prepara o statement
    $comando = $conexao->prepare($sql);

    // Vincula o parâmetro à instrução
    // 'i' significa integer, pois o ID é um número inteiro
    $comando->bind_param("i", $id_emprestimo);

    // Executa o statement
    $comando->execute();

    // Pega o resultado da consulta
    $resultado = $comando->get_result();

          if ($resultado->num_rows > 0) {
            $registro = $resultado->fetch_assoc();

            $id_emprestimo = $registro['id_emprestimo'];
            $matricula_usuario = $registro['matricula_usuario'];
            $isbn_livro = $registro['isbn_livro'];
            $data_emprestimo = $registro['data_emprestimo'];
            $data_devolucao_prevista = $registro['data_devolucao_prevista'];
            $data_devolucao_real = $registro['data_devolucao_real'];

        } else {
            echo "<h4 style='color:red;'>Nenhum livro encontrado com o ISBN fornecido.</h4>";
        }

        $comando->close();
        $conexao->close();
    ?>

    <form method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Empréstimo :: Editar</h2>

                    <div class="form-group">
                        <label>ID do Empréstimo</label>
                        <input type="text" class="form-control" required placeholder="ID" name="id_emprestimo"
                            value="<?php echo $id_emprestimo ?>">
                    </div>

                                   <div class="form-group">
                    <label>ISBN do Livro</label>
                    <input type="text" class="form-control" required="" placeholder="Código ISBN" name="isbn_livro"
                    value="<?php echo $isbn_livro ?>">
                </div>

                <div class="form-group">
                    <label>Matricula do Usuário</label>
                    <input type="text" class="form-control" required="" placeholder="Matrícula do Usuário" name="matricula_usuario"
                    value="<?php echo $matricula_usuario ?>">
                </div>

                <div class="form-group">
                    <label>Data do Empréstimo</label>
                     <input type="date" class="form-control" required="" name="data_emprestimo"
                     value="<?php echo $data_emprestimo ?>">
                </div>

                <div class="form-group">
                    <label>Data de Devolução Prevista</label>
                    <input type="date" class="form-control" required="" name="data_devolucao_prevista"
                    value="<?php echo $data_devolucao_prevista ?>">
                </div>

                <div class="form-group">
                    <label>Data de Devolução Real</label>
                    <input type="date" class="form-control" name="data_devolucao_real"
                    value="<?php echo $data_devolucao_real ?>">
                </div>

                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="btEditar" formaction="emprestimo_atualizar.php">
                            Editar
                        </button>

                        <button type="submit" class="btn btn-warning" name="btExcluir" formaction="emprestimo_deletar.php">
                            Excluir
                        </button>

                        <a href="index.php">
                            <button type="button" class="btn btn-danger" name="btVoltar">Voltar</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </form>
</body>

</html>
