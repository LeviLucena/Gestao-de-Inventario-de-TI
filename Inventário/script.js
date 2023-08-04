// Função para exibir os dados da tabela "cpu"
function exibirTabela($conexao)
{
    $sql = "SELECT * FROM cpu";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<h2>Entrada CPU</h2>';
        echo '<table id="cpu-table" class="table table-striped table-bordered">';
        echo '<thead><tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Série</th><th>Processador</th><th>Memória Ram</th><th>Armazenamento</th><th>Quantidade</th><th>Obs</th><th>Ações</th></tr></thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . $row['ID'] . '</td>';
            echo '<td>' . $row['MARCA'] . '</td>';
            echo '<td>' . $row['MODELO'] . '</td>';
            echo '<td>' . $row['SERIE'] . '</td>';
            echo '<td>' . $row['PROCESSADOR'] . '</td>';
            echo '<td>' . $row['MEMORIA_RAM'] . '</td>';
            echo '<td>' . $row['ARMAZENAMENTO'] . '</td>';
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
function exibirTabelaCpuSaida($conexao)
{
    $sql = "SELECT * FROM cpu_saida";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<h2>Saida CPU</h2>';
        echo '<table id="cpu_saida-table" class="table table-striped table-bordered">';
        echo '<thead><tr><th>CPU_ID</th><th>Marca</th><th>Modelo</th><th>Série</th><th>Processador</th><th>Memória Ram</th><th>Armazenamento</th><th>Quantidade</th><th>Obs</th><th>Ações</th></tr></thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . $row['CPU_ID'] . '</td>';
            echo '<td>' . $row['MARCA'] . '</td>';
            echo '<td>' . $row['MODELO'] . '</td>';
            echo '<td>' . $row['SERIE'] . '</td>';
            echo '<td>' . $row['PROCESSADOR'] . '</td>';
            echo '<td>' . $row['MEMORIA_RAM'] . '</td>';
            echo '<td>' . $row['ARMAZENAMENTO'] . '</td>';
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