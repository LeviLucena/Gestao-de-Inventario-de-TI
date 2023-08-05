<?php
// Verifica se o formulário foi submetido
if (isset($_POST['submit_edit'])) {
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "INVENTARIO";

    // Conecta ao banco de dados
    $conexao = mysqli_connect($host, $usuario, $senha, $banco);

    // Verifica se houve erro na conexão
    if (mysqli_connect_errno()) {
        echo '<div class="message error">Erro na conexão com o banco de dados: ' . mysqli_connect_error() . '</div>';
    } else {
        // Obtém os valores do formulário e escapa as strings
        $idcpu = mysqli_real_escape_string($conexao, $_POST['idcpu']);
        $marca = mysqli_real_escape_string($conexao, $_POST['MARCA']);
        $modelo = mysqli_real_escape_string($conexao, $_POST['MODELO']);
        $serie = mysqli_real_escape_string($conexao, $_POST['SERIE']);
        $processador = mysqli_real_escape_string($conexao, $_POST['PROCESSADOR']);
        $memoria_ram = mysqli_real_escape_string($conexao, $_POST['MEMORIA_RAM']);
        $armazenamento = mysqli_real_escape_string($conexao, $_POST['ARMAZENAMENTO']);
        $quantidade = mysqli_real_escape_string($conexao, $_POST['QUANTIDADE']);
        $obs = mysqli_real_escape_string($conexao, $_POST['OBS']);

        // Validação dos campos
        $errors = array();

        if (empty($marca) || empty($modelo) || empty($serie) || empty($processador) || empty($memoria_ram) || empty($armazenamento) || empty($quantidade) || empty($obs)) {
            $errors[] = "Todos os campos são obrigatórios.";
        }

        // Verifica se há erros
        if (count($errors) > 0) {
            echo '<div class="message error">' . implode('<br>', $errors) . '</div>';
        } else {
            // Atualiza o registro na tabela "cpu"
            $sql_update = "UPDATE cpu SET MARCA = ?, MODELO = ?, SERIE = ?, PROCESSADOR = ?, MEMORIA_RAM = ?, ARMAZENAMENTO = ?, QUANTIDADE = ?, OBS = ? WHERE ID = ?";
            $stmt_update = mysqli_prepare($conexao, $sql_update);
            mysqli_stmt_bind_param($stmt_update, "ssssssisi", $marca, $modelo, $serie, $processador, $memoria_ram, $armazenamento, $quantidade, $obs, $idcpu);

            if (mysqli_stmt_execute($stmt_update)) {
                echo '<div class="message success">Registro atualizado com sucesso.</div>';
            } else {
                echo '<div class="message error">Erro ao atualizar o item: ' . mysqli_error($conexao) . '</div>';
            }
        }
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}
?>
