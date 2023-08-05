<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Editar Componente</title>
    <!-- Adicione os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Editar Componente - CPU</h1>

        <?php
        // Conexão com o banco de dados
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "INVENTARIO";

        $conexao = mysqli_connect($host, $usuario, $senha, $banco);

        // Verifica se houve erro na conexão
        if (mysqli_connect_errno()) {
            echo '<div class="message error">Erro na conexão com o banco de dados: ' . mysqli_connect_error() . '</div>';
        } else {
            // Verifica se o ID do componente foi fornecido na URL
            if (isset($_GET['id'])) {
                $idComponente = $_GET['id'];

                // Consulta para obter os dados do componente pelo ID
                $sql = "SELECT * FROM CPU WHERE ID = $idComponente";
                $resultado = mysqli_query($conexao, $sql);

                if (mysqli_num_rows($resultado) > 0) {
                    // Recupera os dados do componente
                    $componente = mysqli_fetch_assoc($resultado);

                    // Verifica se o formulário foi submetido (botão "Salvar" clicado)
                    if (isset($_POST['submit_edit'])) {
                        // Obtém os novos valores dos campos do formulário
                        $novaMarca = $_POST['marca'];
                        $novoModelo = $_POST['modelo'];
                        $novaSerie = $_POST['serie'];
                        $novaProcessador = $_POST['processador'];
                        $novaMemoria_Ram = $_POST['memoria_ram'];
                        $novaArmazenamento = $_POST['armazenamento'];
                        $novaQuantidade = $_POST['quantidade'];
                        $novaObs = $_POST['obs'];

                        // Atualiza os dados do componente no banco de dados
                        $sqlAtualizar = "UPDATE CPU SET MARCA = '$novaMarca', MODELO = '$novoModelo', SERIE = '$novaSerie', PROCESSADOR = '$novaProcessador', MEMORIA_RAM = '$novaMemoria_Ram', ARMAZENAMENTO = '$novaArmazenamento', QUANTIDADE = '$novaQuantidade', OBS = '$novaObs' WHERE ID = $idComponente";

                        if (mysqli_query($conexao, $sqlAtualizar)) {
                            echo '<div class="message success">Dados do componente atualizados com sucesso.</div>';
                            // Recarrega a página para exibir os dados atualizados
                            header("Location: editar_componente.php?id=$idComponente");
                            exit();
                        } else {
                            echo '<div class="message error">Erro ao atualizar os dados do componente: ' . mysqli_error($conexao) . '</div>';
                        }
                    }
                    ?>
                    <form method="post">
                        <div class="form-container inline">
                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <input type="text" name="marca" id="marca" class="form-control" required value="<?php echo $componente['MARCA']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="modelo">Modelo:</label>
                                <input type="text" name="modelo" id="modelo" class="form-control" required value="<?php echo $componente['MODELO']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="serie">Série:</label>
                                <input type="text" name="serie" id="serie" class="form-control" required value="<?php echo $componente['SERIE']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="processador">Processador:</label>
                                <input type="text" name="processador" id="processador" class="form-control" required value="<?php echo $componente['PROCESSADOR']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="armazenamento">Armazenamento:</label>
                                <input type="text" name="armazenamento" id="armazenamento" class="form-control" required value="<?php echo $componente['ARMAZENAMENTO']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="quantidade">Quantidade:</label>
                                <input type="text" name="quantidade" id="quantidade" class="form-control" required value="<?php echo $componente['QUANTIDADE']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="obs">Observação:</label>
                                <input type="text" name="obs" id="obs" class="form-control" required value="<?php echo $componente['OBS']; ?>">
                            </div>


                            <!-- Adicione outros campos do formulário com os dados do componente -->

                            <button type="submit" name="submit_edit" class="btn btn-primary btn-lg">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Salvar
                            </button>
                        </div>
                    </form>
                    <?php
                } else {
                    echo '<div class="message error">Componente não encontrado.</div>';
                }
            } else {
                echo '<div class="message error">ID do componente não fornecido.</div>';
            }

            // Fecha a conexão com o banco de dados
            mysqli_close($conexao);
        }
        ?>
    </div>
</body>
</html>
