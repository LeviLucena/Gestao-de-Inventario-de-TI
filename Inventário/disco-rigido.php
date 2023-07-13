<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Gestão de Entrada e Saída</title>

    <!-- Adicione os arquivos CSS do Bootstrap e DataTables -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

    <!-- Adicione os arquivos JS do jQuery, Bootstrap e DataTables -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
</head>
<body>

<h1 class="text-center">Gestão de Entrada de Equipamento - Disco</h1>
<form method="post">
    <!-- Formulário para registrar entrada/saída -->
    <div class="form-container inline">
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="capacidade">Capacidade:</label>
            <input type="text" name="capacidade" id="capacidade" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="velocidade">Velocidade:</label>
            <input type="text" name="velocidade" id="velocidade" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="interface">Interface:</label>
            <input type="text" name="interface" id="interface" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="conexao">Conexão:</label>
            <input type="text" name="conexao" id="conexao" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" step="001" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="obs">Observação:</label>
            <input type="text" name="obs" id="obs" class="form-control" required>
        </div>

        <button type="submit" name="submit_insert" class="btn btn-primary btn-lg" onclick="inserirRegistro()">
            <span class="glyphicon glyphicon-plus"></span> Inserir
        </button>

    </div>    
</form>

<?php
// Função para exibir os dados de uma tabela
function exibirTabela($conexao, $tabela)
{
    $sql = "SELECT * FROM $tabela";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<h2>' . $tabela . '</h2>';
        echo '<table id="' . $tabela . '-table" class="table table-striped table-bordered">';
        echo '<thead><tr><th>ID</th><th>Marca</th><th>Capacidade</th><th>Velocidade</th><th>Interface</th><th>Conexão</th><th>Quantidade</th><th>Obs</th><th>Ações</th></tr></thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . $row['ID'] . '</td>';
            echo '<td>' . $row['MARCA'] . '</td>';
            echo '<td>' . $row['CAPACIDADE'] . '</td>';
            echo '<td>' . $row['VELOCIDADE'] . '</td>';
            echo '<td>' . $row['INTERFACE'] . '</td>';
            echo '<td>' . $row['CONEXAO'] . '</td>';
            echo '<td>' . $row['QUANTIDADE'] . '</td>';
            echo '<td>' . $row['OBS'] . '</td>';
            echo '<td><button class="btn btn-primary btn-editar"><span class="glyphicon glyphicon-pencil"></span> Editar</button></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }
}

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
    // Verifica se o formulário foi submetido
    if (isset($_POST['submit'])) {
        // Obtém os valores do formulário
        $item = $_POST['item'];
        $quantidade = $_POST['quantidade'];
        $tipo = $_POST['tipo'];

        // Validação dos campos
        $errors = array();

        if (empty($item)) {
            $errors[] = "Selecione um item.";
        }

        // Verificação dos campos quantidade e tipo
        if (empty($quantidade) || $quantidade <= 0) {
            $errors[] = "Digite uma quantidade válida.";
        }

        if (empty($tipo)) {
            $errors[] = "Selecione um tipo (entrada/saída).";
        }

        // Verifica se há erros
        if (count($errors) > 0) {
            echo '<div class="message error">' . implode('<br>', $errors) . '</div>';
        } else {
            // Insere o registro na tabela correspondente
            $tabela = $tipo == 'ENTRADA' ? 'ENTRADA' : 'SAIDA';

            $sql = "INSERT INTO $tabela (item, quantidade) VALUES ('$item', $quantidade)";

            if (mysqli_query($conexao, $sql)) {
                echo '<div class="message success">Registro realizado com sucesso.</div>';
            } else {
                echo '<div class="message error">Erro ao registrar o item: ' . mysqli_error($conexao) . '</div>';
            }
        }
    }

    // Exibe os dados das tabelas
    $tabelas = array("DISCO");

    foreach ($tabelas as $tabela) {
        exibirTabela($conexao, $tabela);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}
?>

<script>
    $(document).ready(function() {
        // Inicializa o DataTables para cada tabela
        <?php foreach ($tabelas as $tabela) { ?>
            $('#<?= $tabela ?>-table').DataTable();
        <?php } ?>
    });
</script>
</body>
</html>

