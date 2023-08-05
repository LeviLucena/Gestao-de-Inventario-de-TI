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
<h1 class="text-center">Editar Equipamento - Disco</h1>
<form method="post" action="atualizar.php">
    <!-- Formulário para registrar entrada/saída -->
    <div class="form-container inline">
        <div class="form-group">
        <div class="form-group">
            <label for="MARCA">Marca:</label>
            <input type="text" name="MARCA" id="MARCA" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="CAPACIDADE">Capacidade:</label>
            <input type="text" name="CAPACIDADE" id="CAPACIDADE" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="VELOCIDADE">Velocidade:</label>
            <input type="text" name="VELOCIDADE" id="VELOCIDADE" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="INTERFACE">Interface:</label>
            <input type="text" name="INTERFACE" id="INTERFACE" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="CONEXAO">Conexão:</label>
            <input type="text" name="CONEXAO" id="CONEXAO" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="QUANTIDADE">Quantidade:</label>
            <input type="text" name="QUANTIDADE" id="QUANTIDADE" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="OBS">Observação:</label>
            <input type="text" name="OBS" id="OBS" class="form-control" required>
        </div>

        <button type="submit" name="submit_edit" class="btn btn-primary btn-lg">
        <span class="glyphicon glyphicon-floppy-disk"></span> Atualizar
    </button>

    </div>    
</form>
</body>
</html>