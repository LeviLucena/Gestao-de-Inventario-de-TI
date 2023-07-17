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

    <div class="container">
        <h1>Gestão de Entrada e Saída de Equipamentos</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>Entrada</h2>
                <!-- Formulário para registrar entrada -->
                <form method="post">
                    <!-- Campos para entrada -->

                    <button type="submit" name="submit_entrada" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Inserir Entrada</button>
                </form>

                <!-- Tabela de exibição de dados de entrada -->
                <table id="entrada-table" class="table table-striped table-bordered">
                    <!-- Cabeçalho da tabela de entrada -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Série</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dados da tabela de entrada -->
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h2>Saída</h2>
                <!-- Formulário para registrar saída -->
                <form method="post">
                    <!-- Campos para saída -->

                    <button type="submit" name="submit_saida" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Inserir Saída</button>
                </form>

                <!-- Tabela de exibição de dados de saída -->
                <table id="saida-table" class="table table-striped table-bordered">
                    <!-- Cabeçalho da tabela de saída -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Série</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dados da tabela de saída -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Inicializa o DataTables para a tabela de entrada
            $('#entrada-table').DataTable();

            // Inicializa o DataTables para a tabela de saída
            $('#saida-table').DataTable();
        });
    </script>
</body>
</html>
