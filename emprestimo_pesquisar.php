<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro :: Pesquisar</title>
    <?php
    include "referencias.php";
    ?>
</head>

<body>
    <form method="post">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Empréstimo :: Pesquisar</h2>
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" required="" placeholder="ID do Empréstimo" name="txtID">
                </div>


                <br>
                <div class="form-group">

                    <button type="submit" formaction="emprestimo_editar.php" class="btn btn-primary">Pesquisar</button>

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