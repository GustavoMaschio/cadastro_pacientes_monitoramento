<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de pacientes_monitoramenteo vital</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de pacientes</h1>

        <!-- Formulário para adicionar registros -->
        <form id="addForm">
            <div class="form-group">
                <input type="text" class="form-control" id="nome" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="sexo" placeholder="Sexo" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="idade" placeholder="Idade" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="cidade" placeholder="Cidade" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>

        <!-- Tabela para listar registros -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Idade</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="recordList">
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
