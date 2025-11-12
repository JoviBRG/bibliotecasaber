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


                    <h2>Livro :: Listar</h2>

                    <div class="form-group">
                        <table>
                             <tr>
                                <th>ISBN</th>
                                <th>Nome</th>
                                <th>Ano de Publicação</th>
                                <th>Editora</th>
                                <th>Quant. Total</th>
                                <th>Quant. Disponivel</th>
                            </tr>

                            <?php
                            // Prepara a instrução SQL com um placeholder '?'
                            $sql = "SELECT * FROM livro ORDER BY titulo DESC";

                            // Prepara o statement
                            $comando = $conexao->prepare($sql);

                            // Executa o statement
                            $comando->execute();

                            // Pega o resultado da consulta
                            $resultado = $comando->get_result();

                            while($registro = $resultado->fetch_assoc())
                                {
                                   
                                    $isbn = $registro["isbn"];
                                    $titulo = $registro["titulo"];
                                    $ano_publicacao = $registro['ano_publicacao'];
                                    $editora = $registro["editora"];
                                    $qtd_total = $registro['qtd_total'];
                                    $qtd_disponivel = $registro['qtd_disponivel'];  
                            ?>

                            <tr>
                                <td><?php echo $isbn ?></td>
                                <td><?php echo $titulo ?></td>
                                <td><?php echo $ano_publicacao ?></td>
                                <td><?php echo $editora ?></td>
                                <td><?php echo $qtd_total ?></td>
                                <td><?php echo $qtd_disponivel ?></td>
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