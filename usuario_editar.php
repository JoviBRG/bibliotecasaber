<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário :: Editar</title>
    <?php
    include "referencias.php";
    ?>
</head>

<body>
    <br>
    <?php
    include "conexao_bd.php"; // conexão com o banco

    // Inicializa variáveis
    $matricula = "";
    $nome = "";
    $email = "";
    $tipo_usuario = "";
    $data_cadastro = "";

    // Recebe matrícula enviada do formulário de pesquisa
    $matricula = $_POST["matricula"];

    // SQL para buscar o usuário
    $sql = "SELECT * FROM usuario WHERE matricula = ?";

    $comando = $conexao->prepare($sql);
    $comando->bind_param("s", $matricula);
    $comando->execute();

    $resultado = $comando->get_result();

    if ($resultado->num_rows > 0) {
        $registro = $resultado->fetch_assoc();

        $nome = $registro["nome"];
        $email = $registro["email"];
        $tipo_usuario = $registro["tipo_usuario"];
        $data_cadastro = $registro["data_cadastro"];
    } else {
        echo "<h4>Nenhum usuário encontrado com a matrícula fornecida.</h4>";
    }

    $comando->close();
    $conexao->close();
    ?>

    <form method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Usuário :: Editar</h2>

                    <div class="form-group">
                        <label>Matrícula</label>
                        <input type="text" class="form-control" required placeholder="Matrícula" name="matricula"
                            value="<?php echo $matricula ?>">
                    </div>

                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" required placeholder="Nome completo"
                            name="nome" value="<?php echo $nome ?>">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required placeholder="E-mail"
                            name="email" value="<?php echo $email ?>">
                    </div>

                    <div class="form-group">
                        <label>Tipo de Usuário</label>
                        <select name="tipo_usuario" class="form-control" required>
                            <option value="">Selecione</option>
                            <option value="Aluno" <?php if ($tipo_usuario == "Aluno") echo "selected"; ?>>Aluno</option>
                            <option value="Professor" <?php if ($tipo_usuario == "Professor") echo "selected"; ?>>Professor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Data de Cadastro</label>
                        <input type="date" class="form-control" required name="data_cadastro"
                            value="<?php echo $data_cadastro ?>">
                    </div>

                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="btEditar" formaction="usuario_atualizar.php">
                            Editar
                        </button>

                        <button type="submit" class="btn btn-warning" name="btExcluir" formaction="usuario_deletar.php">
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
