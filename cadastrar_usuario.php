<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário :: Cadastrar</title>
    <?php
    include "referencias.php";
    ?>
</head>

<body>
<form method="post" action="usuario_inserir.php">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <h2>Usuário :: Cadastrar</h2>

                    <div class="form-group">
                        <label>Matrícula</label>
                        <input type="text" class="form-control" required placeholder="Matrícula do Usuário" name="matricula">
                    </div>

                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" required placeholder="Nome completo" name="nome">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required placeholder="E-mail" name="email">
                    </div>

                    <div class="form-group">
                        <label>Tipo de Usuário</label>
                        <select class="form-control" name="tipo_usuario" required>
                            <option value="">Selecione...</option>
                            <option value="Aluno">Aluno</option>
                            <option value="Professor">Professor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Data de Cadastro</label>
                        <input type="date" class="form-control" required name="data_cadastro">
                    </div>

                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Cadastrar</button>

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
