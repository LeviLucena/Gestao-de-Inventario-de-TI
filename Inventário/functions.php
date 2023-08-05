<?php
// functions.php

// Função para exibir os dados da tabela "CPU"
function exibirTabela($conexao, $tabela)
{
    $sql = "SELECT * FROM $tabela";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<h2>' . $tabela . '</h2>';
        echo '<table id="' . $tabela . '-table" class="table table-striped table-bordered">';
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
            echo '<td><button class="btn btn-primary btn-editar editar-btn" data-id="' . $row['ID'] . '"><span class="glyphicon glyphicon-pencil"></span> Editar</button></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }
}
?>
