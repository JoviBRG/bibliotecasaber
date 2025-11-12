<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Marcar</title>
    <?php
    include "referencias.php";
    ?>
</head>

<body>
    <form method="post" action="livro_inserir.php">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Livro :: Cadastrar</h2>
                <div class="form-group">
                    <label>ISBN</label>
                    <input type="text" class="form-control" required="" placeholder="Código ISBN" name="isbn">
                </div>

                <div class="form-group">
                    <label>Titulo</label>
                    <input type="text" class="form-control" required="" placeholder="Nome do Livro" name="titulo">
                </div>

                <div class="form-group">
                    <label>Ano de Publicação</label>
                     <input type="text" class="form-control" required="" placeholder="Ano de Publicação" name="anoPublicacao">
                </div>

                <div class="form-group">
                    <label>Editora</label>
                    <input type="text" class="form-control" required="" placeholder="Editora" name="editora">
                </div>


                <div class="form-group">
                    <label>Quantidade Total</label>
                    <input type="text" class="form-control" placeholder="Quantidade Total" name="qtdTotal">
                </div>

                <div class="form-group">
                    <label>Quantidade Disponível</label>
                    <input type="text" class="form-control" required="" placeholder="Quantidade Disponível" name="qtdDisponivel">
                </div>


                <br>
                <div class="form-group">

                    <button class="btn btn-primary" type="submit">Marcar</button>

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