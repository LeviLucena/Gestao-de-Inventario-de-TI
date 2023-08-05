<?php
// transferir.php

// Conexão com o banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "INVENTARIO";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if (mysqli_connect_errno()) {
    echo json_encode(array('status' => 'error', 'message' => 'Erro na conexão com o banco de dados.'));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['quantidade']) && isset($_POST['tipo'])) {
    $id = $_POST['id'];
    $quantidade = $_POST['quantidade'];
    $tipo = $_POST['tipo'];

    if ($tipo === 'saida') {
        // Verifica se a quantidade é menor ou igual à quantidade disponível em "CPU"
        $sql_check_quantity = "SELECT QUANTIDADE FROM cpu WHERE ID = ? AND QUANTIDADE >= ?";
        $stmt_check_quantity = mysqli_prepare($conexao, $sql_check_quantity);
        mysqli_stmt_bind_param($stmt_check_quantity, "ii", $id, $quantidade);
        mysqli_stmt_execute($stmt_check_quantity);
        $resultado_check_quantity = mysqli_stmt_get_result($stmt_check_quantity);

        if (mysqli_num_rows($resultado_check_quantity) > 0) {
            // Insere o registro na tabela "cpu_saida"
            $sql_insert_saida = "INSERT INTO cpu_saida (MARCA, MODELO, SERIE, PROCESSADOR, MEMORIA_RAM, ARMAZENAMENTO, QUANTIDADE, OBS)
                                SELECT MARCA, MODELO, SERIE, PROCESSADOR, MEMORIA_RAM, ARMAZENAMENTO, ?, OBS
                                FROM cpu
                                WHERE ID = ?";
            $stmt_insert_saida = mysqli_prepare($conexao, $sql_insert_saida);
            mysqli_stmt_bind_param($stmt_insert_saida, "ii", $quantidade, $id);

            if (mysqli_stmt_execute($stmt_insert_saida)) {
                // Atualiza a quantidade na tabela "cpu"
                $sql_update_cpu = "UPDATE cpu SET QUANTIDADE = QUANTIDADE - ? WHERE ID = ?";
                $stmt_update_cpu = mysqli_prepare($conexao, $sql_update_cpu);
                mysqli_stmt_bind_param($stmt_update_cpu, "ii", $quantidade, $id);

                if (mysqli_stmt_execute($stmt_update_cpu)) {
                    echo json_encode(array('status' => 'success', 'message' => 'Transferência de saída realizada com sucesso.'));
                    exit;
                }
            }
        }
    } elseif ($tipo === 'entrada') {
        // Verifica se a quantidade é menor ou igual à quantidade disponível em "CPU_SAIDA"
        $sql_check_quantity = "SELECT QUANTIDADE FROM cpu_saida WHERE CPU_ID = ? AND QUANTIDADE >= ?";
        $stmt_check_quantity = mysqli_prepare($conexao, $sql_check_quantity);
        mysqli_stmt_bind_param($stmt_check_quantity, "ii", $id, $quantidade);
        mysqli_stmt_execute($stmt_check_quantity);
        $resultado_check_quantity = mysqli_stmt_get_result($stmt_check_quantity);

        if (mysqli_num_rows($resultado_check_quantity) > 0) {
            // Insere o registro na tabela "cpu"
            $sql_insert_entrada = "INSERT INTO cpu (MARCA, MODELO, SERIE, PROCESSADOR, MEMORIA_RAM, ARMAZENAMENTO, QUANTIDADE, OBS)
                                  SELECT MARCA, MODELO, SERIE, PROCESSADOR, MEMORIA_RAM, ARMAZENAMENTO, ?, OBS
                                  FROM cpu_saida
                                  WHERE CPU_ID = ?";
            $stmt_insert_entrada = mysqli_prepare($conexao, $sql_insert_entrada);
            mysqli_stmt_bind_param($stmt_insert_entrada, "ii", $quantidade, $id);

            if (mysqli_stmt_execute($stmt_insert_entrada)) {
                // Atualiza a quantidade na tabela "cpu_saida"
                $sql_update_cpu_saida = "UPDATE cpu_saida SET QUANTIDADE = QUANTIDADE - ? WHERE CPU_ID = ?";
                $stmt_update_cpu_saida = mysqli_prepare($conexao, $sql_update_cpu_saida);
                mysqli_stmt_bind_param($stmt_update_cpu_saida, "ii", $quantidade, $id);

                if (mysqli_stmt_execute($stmt_update_cpu_saida)) {
                    echo json_encode(array('status' => 'success', 'message' => 'Transferência de entrada realizada com sucesso.'));
                    exit;
                }
            }
        }
    }
}

echo json_encode(array('status' => 'error', 'message' => 'Ocorreu um erro na transferência.'));
?>
