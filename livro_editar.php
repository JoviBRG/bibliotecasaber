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

    $isbn = "";
    $titulo = "";
    $ano_publicacao = "";
    $editora = "";
    $qtd_total = "";
    $qtd_disponivel = "";
    // O ID do registro que você quer buscar
    $isbn = $_POST["txtISBN"];
    
    // Prepara a instrução SQL com um placeholder '?'
    $sql = "SELECT * FROM livro WHERE isbn = ?";

    // Prepara o statement
    $comando = $conexao->prepare($sql);

    // Vincula o parâmetro à instrução
    // 'i' significa integer, pois o ID é um número inteiro
    $comando->bind_param("s", $isbn);

    // Executa o statement
    $comando->execute();

    // Pega o resultado da consulta
    $resultado = $comando->get_result();
  
        if ($resultado->num_rows > 0) {
            $registro = $resultado->fetch_assoc();

            $titulo = $registro["titulo"];
            $ano_publicacao = $registro["ano_publicacao"];
            $editora = $registro["editora"];
            $qtd_total = $registro["qtd_total"];
            $qtd_disponivel = $registro["qtd_disponivel"];
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
                    <h2>Livro :: Editar</h2>

                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" class="form-control" required placeholder="ISBN" name="isbn"
                            value="<?php echo $isbn ?>">
                    </div>

                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" class="form-control" required placeholder="Título"
                            name="titulo" value="<?php echo $titulo ?>">
                    </div>

                    <div class="form-group">
                        <label>Ano de Publicação</label>
                        <input type="text" class="form-control" required placeholder="Ano de Publicação"
                            name="ano_publicacao" value="<?php echo $ano_publicacao ?>">
                    </div>

                    <div class="form-group">
                        <label>Editora</label>
                        <input type="text" class="form-control" placeholder="Editora"
                            name="editora" value="<?php echo $editora ?>">
                    </div>

                    <div class="form-group">
                        <label>Quantidade Total</label>
                        <input type="number" class="form-control" placeholder="Quantidade Total"
                            name="qtd_total" value="<?php echo $qtd_total ?>">
                    </div>

                    <div class="form-group">
                        <label>Quantidade Disponível</label>
                        <input type="number" class="form-control" placeholder="Quantidade Disponível"
                            name="qtd_disponivel" value="<?php echo $qtd_disponivel ?>">
                    </div>

                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="btEditar" formaction="livro_atualizar.php">
                            Editar
                        </button>

                        <button type="submit" class="btn btn-warning" name="btExcluir" formaction="livro_deletar.php">
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
