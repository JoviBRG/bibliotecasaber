<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro :: Listar</title>

    <?php
    include "referencias.php";
    ?>

</head>

<body>
    <form  action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">


                    <h2>Empréstimo :: Listar</h2>

                    <div class="form-group">
                        <table class="table table-striped table-bordered">
                             <tr>
                                <th>ID do Empréstimo</th>
                                <th>Matrícula do Usuário</th>
                                <th>ISBN do Livro</th>
                                <th>Data de Empréstimo</th>
                                <th>Data de Devolução Prevista</th>
                                <th>Data de Devolução Real</th>
                            </tr>

                            <?php
                            // Prepara a instrução SQL com um placeholder '?'
                            $sql = "SELECT * FROM emprestimo ORDER BY id_emprestimo DESC";

                            // Prepara o statement
                            $comando = $conexao->prepare($sql);

                            // Executa o statement
                            $comando->execute();

                            // Pega o resultado da consulta
                            $resultado = $comando->get_result();

                            while($registro = $resultado->fetch_assoc())
                                {
                                   
                                $id_emprestimo = $registro['id_emprestimo'];
                                $matricula_usuario = $registro['matricula_usuario'];
                                $isbn_livro = $registro['isbn_livro'];
                                $data_emprestimo = $registro["data_emprestimo"];
                                $data_devolucao_prevista = $registro["data_devolucao_prevista"];
                                $data_devolucao_real = $registro["data_devolucao_real"];  
                            ?>

                            <tr>
                                <td><?php echo $id_emprestimo ?></td>
                                <td><?php echo $matricula_usuario ?></td>
                                <td><?php echo $isbn_livro ?></td>
                                <td><?php echo $data_emprestimo ?></td>
                                <td><?php echo $data_devolucao_prevista ?></td>
                                <td><?php echo $data_devolucao_real ?></td>
                            </tr>
                            
                            <?php } ?>

                        </table>
                    </div>

                    <div class="form-group">

                        <a href="index.php">
                            <button type="button" class="btn btn-danger" name="btVoltar">
                                Voltar
                            </button>
                        </a>

                    </div>

                </div>

            </div>
        </div>

    </form>

</body>

</html>