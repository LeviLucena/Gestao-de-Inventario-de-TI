<?php
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

// Criação da tabela CPU
$sql = "CREATE TABLE IF NOT EXISTS CPU (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    descricao TEXT
)";

if ($conn->query($sql) !== TRUE) {
    echo 'Erro ao criar a tabela CPU: ' . $conn->error;
}

// Criação das demais tabelas (MONITOR, TECLADO, MOUSE, NOTEBOOK, COMPONENTES, ENTRADA, SAIDA)
// Repita o mesmo padrão para criar cada tabela necessária

// Fechar conexão com o banco de dados
$conn->close();
?>
