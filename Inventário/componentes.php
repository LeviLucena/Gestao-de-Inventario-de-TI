<!DOCTYPE html>
<!-- ====================================================================== -->
<!--  Desenvolvido por Levi Lucena - linkedin.com/in/levilucena -->
<!-- ====================================================================== -->
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

<!-- Botão "Voltar" -->
<div class="text-left" style="margin-top: 20px;">
    <button onclick="window.location.href='index.php'" class="btn btn-primary">Voltar</button>
</div>


<h1 class="text-center">Gestão de Entrada e Saída de Equipamento - Componentes</h1>
<form method="post" action="inserir.php">
    <!-- Formulário para registrar entrada/saída -->
    <div class="form-container inline">
        <div class="form-group">
            <label for="MARCA">Marca:</label>
            <input type="text" name="MARCA" id="MARCA" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="MODELO">Modelo:</label>
            <input type="text" name="MODELO" id="MODELO" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="SERIE">Série:</label>
            <input type="text" name="SERIE" id="SERIE" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="TIPO">Tipo:</label>
            <input type="text" name="TIPO" id="TIPO" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="DESCRICAO">Descrição:</label>
            <input type="text" name="DESCRICAO" id="DESCRICAO" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="QUANTIDADE">Quantidade:</label>
            <input type="text" name="QUANTIDADE" id="QUANTIDADE" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="OBS">Observação:</label>
            <input type="text" name="OBS" id="OBS" class="form-control" required>
        </div>

        <button type="submit" name="submit_insert" class="btn btn-primary btn-lg">
            <span class="glyphicon glyphicon-plus"></span> Inserir
        </button>

    </div>    
</form>


<?php
// Função para exibir os dados da tabela "cpu"
function exibirTabela($conexao)
{
    $sql = "SELECT * FROM componentes";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<h2>Entrada Componentes</h2>';
        echo '<table id="componentes-table" class="table table-striped table-bordered">';
        echo '<thead><tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Série</th><th>Tipo</th><th>Descrição</th><th>Quantidade</th><th>Obs</th><th>Ações</th></tr></thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . $row['ID'] . '</td>';
            echo '<td>' . $row['MARCA'] . '</td>';
            echo '<td>' . $row['MODELO'] . '</td>';
            echo '<td>' . $row['SERIE'] . '</td>';
            echo '<td>' . $row['TIPO'] . '</td>';
            echo '<td>' . $row['DESCRICAO'] . '</td>';
            echo '<td>' . $row['QUANTIDADE'] . '</td>';
            echo '<td>' . $row['OBS'] . '</td>';
            echo '<td><button class="btn btn-primary btn-editar"><span class="glyphicon glyphicon-pencil"></span> Editar</button>';
            echo '<button class="btn btn-success btn-saida"><span class="glyphicon glyphicon-export"></span> Saída</button>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }
}

// Função para exibir os dados da tabela "saida_cpu"
function exibirTabelaComponentesSaida($conexao)
{
    $sql = "SELECT * FROM componentes_saida";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<h2>Saida Componentes</h2>';
        echo '<table id="componentes_saida-table" class="table table-striped table-bordered">';
        echo '<thead><tr><th>COMPONENTE_ID</th><th>Marca</th><th>Modelo</th><th>Série</th><th>Tipo</th><th>Descrição</th><th>Quantidade</th><th>Obs</th><th>Ações</th></tr></thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . $row['COMPONENTE_ID'] . '</td>';
            echo '<td>' . $row['MARCA'] . '</td>';
            echo '<td>' . $row['MODELO'] . '</td>';
            echo '<td>' . $row['SERIE'] . '</td>';
            echo '<td>' . $row['TIPO'] . '</td>';
            echo '<td>' . $row['DESCRICAO'] . '</td>';
            echo '<td>' . $row['QUANTIDADE'] . '</td>';
            echo '<td>' . $row['OBS'] . '</td>';
            echo '<td><button class="btn btn-primary btn-editar"><span class="glyphicon glyphicon-pencil"></span> Editar</button>';
            echo '<button class="btn btn-info btn-entrada"><span class="glyphicon glyphicon-import"></span> Entrada</button>';
            echo '</td>';
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
    if (isset($_POST['submit_insert'])) {
        // Obtém os valores do formulário e escapa as strings
        $MARCA = mysqli_real_escape_string($conexao, $_POST['MARCA']);
        $MODELO = mysqli_real_escape_string($conexao, $_POST['MODELO']);
        $SERIE = mysqli_real_escape_string($conexao, $_POST['SERIE']);
        $TIPO = mysqli_real_escape_string($conexao, $_POST['TIPO']);
        $DESCRICAO = mysqli_real_escape_string($conexao, $_POST['DESCRICAO']);
        $QUANTIDADE = mysqli_real_escape_string($conexao, $_POST['QUANTIDADE']);
        $OBS = mysqli_real_escape_string($conexao, $_POST['OBS']);

        echo "Formulário enviado com sucesso!";

        // Validação dos campos
        $errors = array();



        if (empty($MARCA) || empty($MODELO) || empty($SERIE) || empty($TIPO) || empty($DESCRICAO) || empty($QUANTIDADE) || empty($OBS)) {
            $errors[] = "Todos os campos são obrigatórios.";
        }

        // Verifica se há erros
        if (count($errors) > 0) {
            echo '<div class="message error">' . implode('<br>', $errors) . '</div>';
        } else {
            // Verifica se há a quantidade disponível para transferir
            $sql_check_quantity = "SELECT QUANTIDADE FROM componentes WHERE QUANTIDADE >= ?";
            $stmt_check_quantity = mysqli_prepare($conexao, $sql_check_quantity);
            mysqli_stmt_bind_param($stmt_check_quantity, "i", $QUANTIDADE);
            mysqli_stmt_execute($stmt_check_quantity);
            $resultado_check_quantity = mysqli_stmt_get_result($stmt_check_quantity);

            if (mysqli_num_rows($resultado_check_quantity) > 0) {
                // Insere o registro na tabela "componentes_saida"
                $sql_insert_saida = "INSERT INTO componentes_saida (MARCA, MODELO, SERIE, TIPO, DESCRICAO, QUANTIDADE, OBS) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt_insert_saida = mysqli_prepare($conexao, $sql_insert_saida);
                mysqli_stmt_bind_param($stmt_insert_saida, "ssssssis", $MARCA, $MODELO, $SERIE, $TIPO, $DESCRICAO, $QUANTIDADE, $OBS);

                if (mysqli_stmt_execute($stmt_insert_saida)) {
                    // Atualiza a quantidade na tabela "cpu"
                    $sql_update_componentes = "UPDATE componentes SET QUANTIDADE = QUANTIDADE - ? WHERE QUANTIDADE >= ?";
                    $stmt_update_componentes = mysqli_prepare($conexao, $sql_update_componentes);
                    mysqli_stmt_bind_param($stmt_update_componentes, "ii", $QUANTIDADE, $QUANTIDADE);
                    mysqli_stmt_execute($stmt_update_componentes);

                    echo '<div class="message success">Registro realizado com sucesso.</div>';
                } else {
                    echo '<div class="message error">Erro ao registrar o item: ' . mysqli_error($conexao) . '</div>';
                }
            } else {
                echo '<div class="message error">Quantidade indisponível para transferência.</div>';
            }
        }
    }

    // Exibe os dados das tabelas
    exibirTabela($conexao);
    exibirTabelaComponentesSaida($conexao);

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
        
}
?>

<script>
    $(document).ready(function() {
        // Inicializa o DataTables para cada tabela
        $('#componentes-table').DataTable();
        // Use o ID correto para a tabela "cpu_saida"
        $('#componentes_saida-table').DataTable(); 

        // Evento de clique para o botão "Saída"
        $('.btn-saida').click(function() {
            var row = $(this).closest('tr');
            var id = row.find('td:first').text();
            var quantidadeDisponivel = parseInt(row.find('td:nth-child(8)').text());

            var quantidadeSaida = parseInt(prompt('Digite a quantidade de itens a serem transferidos para a Saída:', 1));
            
            // Valida a entrada do usuário
            if (isNaN(quantidadeSaida) || quantidadeSaida <= 0) {
                alert('Quantidade inválida. A transferência não foi realizada.');
                return;
            }

            // Verifica se a quantidade solicitada é maior que a quantidade disponível
            if (quantidadeSaida > quantidadeDisponivel) {
                alert('A quantidade de saída é maior do que a quantidade disponível.');
                return;
            }

            $.ajax({
                type: "POST",
                url: "transferir.php",
                data: { 
                    id: id,
                    quantidade: quantidadeSaida,
                    tipo: 'saida'
                },
                success: function(response) {
                    alert('Transferência de saída realizada com sucesso.');
                    location.reload(); // Atualiza a página após a transferência
                },
                error: function() {
                    alert('Ocorreu um erro na transferência de saída.');
                }
            });
        });

        // Evento de clique para o botão "Editar"
        $('.btn-editar').click(function() {
            var row = $(this).closest('tr');
            var idcomponentes = row.find('td:first').text();

            // Abre uma nova janela com os campos dimensionados para a edição
            window.open('componentes_editar.php?id=' + idcomponentes, '_blank', 'width=800,height=300');
        });

        // Evento de clique para o botão "Entrada"
        $('.btn-entrada').click(function() {
            var row = $(this).closest('tr');
            var id = row.find('td:first').text();
            var quantidadeSaida = parseInt(row.find('td:nth-child(8)').text());

            var quantidadeEntrada = parseInt(prompt('Digite a quantidade de itens a serem transferidos para a Entrada:', 1));
            
            // Valida a entrada do usuário
            if (isNaN(quantidadeEntrada) || quantidadeEntrada <= 0) {
                alert('Quantidade inválida. A transferência não foi realizada.');
                return;
            }

            // Verifica se a quantidade solicitada é maior que a quantidade disponível na tabela "CPU_SAIDA"
            if (quantidadeEntrada > quantidadeSaida) {
                alert('A quantidade de entrada é maior do que a quantidade disponível na Saída.');
                return;
            }

            $.ajax({
                type: "POST",
                url: "transferir.php",
                data: { 
                    id: id,
                    quantidade: quantidadeEntrada,
                    tipo: 'entrada'
                },
                success: function(response) {
                    alert('Transferência de entrada realizada com sucesso.');
                    location.reload(); // Atualiza a página após a transferência
                },
                error: function() {
                    alert('Ocorreu um erro na transferência de entrada.');
                }
            });
        });
    });
</script>
</body>
</html>