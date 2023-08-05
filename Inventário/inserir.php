<?php
// Verifica se o índice 'REQUEST_METHOD' está definido antes de usá-lo
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados enviados na requisição POST
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
    $MARCA = isset($_POST['MARCA']) ? $_POST['MARCA'] : '';
    $MODELO = isset($_POST['MODELO']) ? $_POST['MODELO'] : '';
    $SERIE = isset($_POST['SERIE']) ? $_POST['SERIE'] : '';
    $QUANTIDADE = isset($_POST['QUANTIDADE']) ? $_POST['QUANTIDADE'] : '';
    $OBS = isset($_POST['OBS']) ? $_POST['OBS'] : '';

    // Validação dos campos (adapte de acordo com suas regras de validação)
    $errors = array();
    if (empty($MARCA)) {
        $errors[] = "O campo 'Marca' é obrigatório.";
    }
    if (empty($MODELO)) {
        $errors[] = "O campo 'Modelo' é obrigatório.";
    }
    if (empty($SERIE)) {
        $errors[] = "O campo 'Serie' é obrigatório.";
    }
    // Adicione mais validações se necessário

    // Se houver erros, retorna uma mensagem de erro
    if (count($errors) > 0) {
        echo implode('<br>', $errors);
    } else {
        // Conexão com o banco de dados (ajuste as informações de conexão)
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "inventario";
        $conexao = mysqli_connect($host, $usuario, $senha, $banco);

        // Verifica se houve erro na conexão
        if (mysqli_connect_errno()) {
            echo "Erro na conexão com o banco de dados: " . mysqli_connect_error();
        } else {
            if ($tipo === 'cpu') {
                $PROCESSADOR = isset($_POST['PROCESSADOR']) ? $_POST['PROCESSADOR'] : '';
                $MEMORIA_RAM = isset($_POST['MEMORIA_RAM']) ? $_POST['MEMORIA_RAM'] : '';
                $ARMAZENAMENTO = isset($_POST['ARMAZENAMENTO']) ? $_POST['ARMAZENAMENTO'] : '';
                $sql = "INSERT INTO cpu (MARCA, MODELO, SERIE, PROCESSADOR, MEMORIA_RAM, ARMAZENAMENTO, QUANTIDADE, OBS) VALUES ('$MARCA', '$MODELO', '$SERIE', '$PROCESSADOR', '$MEMORIA_RAM','$ARMAZENAMENTO', '$QUANTIDADE', '$OBS')";
            } elseif ($tipo === 'componentes') {
                $TIPO = isset($_POST['TIPO']) ? $_POST['TIPO'] : '';
                $DESCRICAO = isset($_POST['DESCRICAO']) ? $_POST['DESCRICAO'] : '';
                $sql = "INSERT INTO componentes (MARCA, MODELO, SERIE, TIPO, DESCRICAO, QUANTIDADE, OBS) VALUES ('$MARCA', '$MODELO', '$SERIE', '$TIPO', '$DESCRICAO', '$QUANTIDADE', '$OBS')";
            } elseif ($tipo === 'disco') {
                $CAPACIDADE = isset($_POST['CAPACIDADE']) ? $_POST['CAPACIDADE'] : '';
                $VELOCIDADE = isset($_POST['VELOCIDADE']) ? $_POST['VELOCIDADE'] : '';
                $INTERFACE = isset($_POST['INTERFACE']) ? $_POST['INTERFACE'] : '';
                $CONEXAO = isset($_POST['CONEXAO']) ? $_POST['CONEXAO'] : '';
                $sql = "INSERT INTO disco (MARCA, CAPACIDADE, VELOCIDADE, INTERFACE, CONEXAO, QUANTIDADE, OBS) VALUES ('$MARCA', '$CAPACIDADE', '$VELOCIDADE', '$INTERFACE', '$CONEXAO', '$QUANTIDADE', '$OBS')";
            } elseif ($tipo === 'monitor') {
                $TAMANHO = isset($_POST['TAMANHO']) ? $_POST['TAMANHO'] : '';
                $RESOLUCAO = isset($_POST['RESOLUCAO']) ? $_POST['RESOLUCAO'] : '';
                $sql = "INSERT INTO monitor (MARCA, MODELO, SERIE, TAMANHO, RESOLUCAO, QUANTIDADE, OBS) VALUES ('$MARCA', '$MODELO', '$SERIE', '$TAMANHO', '$RESOLUCAO', '$QUANTIDADE', '$OBS')";
            } elseif ($tipo === 'teclado') {
                $TIPO_TECLADO = isset($_POST['TIPO_TECLADO']) ? $_POST['TIPO_TECLADO'] : '';
                $LAYOUT = isset($_POST['LAYOUT']) ? $_POST['LAYOUT'] : '';
                $sql = "INSERT INTO teclado (MARCA, MODELO, SERIE, TIPO_TECLADO, LAYOUT, QUANTIDADE, OBS) VALUES ('$MARCA', '$MODELO', '$SERIE', '$TIPO_TECLADO', '$LAYOUT', '$QUANTIDADE', '$OBS')";
            } elseif ($tipo === 'mouse') {
                $TIPO_MOUSE = isset($_POST['TIPO_MOUSE']) ? $_POST['TIPO_MOUSE'] : '';
                $sql = "INSERT INTO mouse (MARCA, MODELO, SERIE, TIPO_MOUSE, QUANTIDADE, OBS) VALUES ('$MARCA', '$MODELO', '$SERIE', '$TIPO_MOUSE', '$QUANTIDADE', '$OBS')";
            } elseif ($tipo === 'notebook') {
                $PROCESSADOR = isset($_POST['PROCESSADOR']) ? $_POST['PROCESSADOR'] : '';
                $MEMORIA_RAM = isset($_POST['MEMORIA_RAM']) ? $_POST['MEMORIA_RAM'] : '';
                $ARMAZENAMENTO = isset($_POST['ARMAZENAMENTO']) ? $_POST['ARMAZENAMENTO'] : '';
                $sql = "INSERT INTO notebook (MARCA, MODELO, SERIE, PROCESSADOR, MEMORIA_RAM, ARMAZENAMENTO, QUANTIDADE, OBS) VALUES ('$MARCA', '$MODELO', '$SERIE', '$PROCESSADOR', '$MEMORIA_RAM','$ARMAZENAMENTO', '$QUANTIDADE', '$OBS')";
            } elseif ($tipo === 'impressora') {
                $TIPO_IMPRESSORA = isset($_POST['TIPO_IMPRESSORA']) ? $_POST['TIPO_IMPRESSORA'] : '';
                $sql = "INSERT INTO impressora (MARCA, MODELO, SERIE, TIPO_IMPRESSORA, QUANTIDADE, OBS) VALUES ('$MARCA', '$MODELO', '$SERIE', '$TIPO_IMPRESSORA', '$QUANTIDADE', '$OBS')";
            } else {
                echo "Tipo inválido.";
                exit; // Finaliza a execução
            }

            // Executa a consulta SQL
            if (mysqli_query($conexao, $sql)) {
                echo "Registro inserido com sucesso.";
            } else {
                echo "Erro ao inserir o registro: " . mysqli_error($conexao);
            }

            // Fecha a conexão com o banco de dados
            mysqli_close($conexao);
        }
    }
} else {
    echo "Requisição inválida.";
}
?>
