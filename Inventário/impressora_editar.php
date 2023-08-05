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
<h1 class="text-center">Editar Equipamento - Impressora</h1>
<form method="post" action="atualizar.php">
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