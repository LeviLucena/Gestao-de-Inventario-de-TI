<?php
// ====================================================================== //
//  Desenvolvido por Levi Lucena - linkedin.com/in/levilucena -->
// ====================================================================== //

// Dados de conexão com o banco de dados
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'INVENTARIO';

// Criar conexão com o banco de dados
$conn = new mysqli($host, $username, $password, $database);

// Verificar se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
}

if ($conn->query($sql) !== TRUE) {
    echo 'Erro ao criar a tabela CPU: ' . $conn->error;
}

// Fechar conexão com o banco de dados
$conn->close();
?>
