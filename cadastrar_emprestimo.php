<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo :: Cadastrar</title>
    <?php
    include "referencias.php";
    ?>
</head>

<body>
    <form method="post" action="emprestimo_inserir.php">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Empréstimo :: Cadastrar</h2>
                <div class="form-group">
                    <label>ISBN do Livro</label>
                    <input type="text" class="form-control" required="" placeholder="Código ISBN" name="isbn_livro">
                </div>

                <div class="form-group">
                    <label>Matricula do Usuário</label>
                    <input type="text" class="form-control" required="" placeholder="Matrícula do Usuário" name="matricula_usuario">
                </div>

                <div class="form-group">
                    <label>Data do Empréstimo</label>
                     <input type="date" class="form-control" required="" name="data_emprestimo">
                </div>

                <div class="form-group">
                    <label>Data de Devolução Prevista</label>
                    <input type="date" class="form-control" required="" name="data_devolucao_prevista">
                </div>

                <div class="form-group">
                    <label>Data de Devolução Real</label>
                    <input type="date" class="form-control" name="data_devolucao_real">
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