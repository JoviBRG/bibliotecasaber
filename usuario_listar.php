<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário :: Listar</title>

    <?php
    include "referencias.php";
    include "conexao_bd.php"; // precisa da conexão
    ?>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <h2>Usuário :: Listar</h2>

                    <div class="form-group">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Matrícula</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Tipo de Usuário</th>
                                <th>Data de Cadastro</th>
                            </tr>

                            <?php
                            // Consulta SQL
                            $sql = "SELECT * FROM usuario ORDER BY nome ASC";

                            // Prepara e executa
                            $comando = $conexao->prepare($sql);
                            $comando->execute();

                            // Resultado
                            $resultado = $comando->get_result();

                            while ($registro = $resultado->fetch_assoc()) {
                                $matricula = $registro["matricula"];
                                $nome = $registro["nome"];
                                $email = $registro["email"];
                                $tipo_usuario = $registro["tipo_usuario"];
                                $data_cadastro = $registro["data_cadastro"];
                            ?>
                                <tr>
                                    <td><?php echo $matricula ?></td>
                                    <td><?php echo $nome ?></td>
                                    <td><?php echo $email ?></td>
                                    <td><?php echo $tipo_usuario ?></td>
                                    <td><?php echo $data_cadastro ?></td>
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
