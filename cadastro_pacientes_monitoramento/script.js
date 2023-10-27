$(document).ready(function() {
    // Função para carregar registros na tabela
    function loadRecords() {
        $.ajax({
            url: "load_records.php",
            type: "GET",
            success: function(data) {
                $("#recordList").html(data);
            }
        });
    }
    
    loadRecords();

    // Adicionar um novo registro
    $("#addForm").on("submit", function(event) {
        event.preventDefault();
        var nome = $("#nome").val();
        var sexo = $("#sexo").val();
        var idade = $("#idade").val();
        var cidade = $("#cidade").val();
        $.ajax({
            url: "add_record.php",
            type: "POST",
            data: {
                nome: nome,
                sexo: sexo,
                idade: idade,
                cidade: cidade
            },
            success: function(data) {
                $("#addForm")[0].reset();
                loadRecords();
            }
        });
    });

    // Atualizar um registro
    $(document).on("click", ".update-button", function() {
        var id = $(this).data("id");
        var nome = $(this).data("nome");
        var sexo = $(this).data("sexo");
        var idade = $(this).data("idade");
        var cidade = $(this).data("cidade");
        $("#updateModal").modal("show");
        $("#updateNome").val(nome);
        $("#updateSexo").val(sexo);
        $("#updateIdade").val(idade);
        $("#updateCidade").val(cidade);
        $("#updateId").val(id);
    });

    $("#updateForm").on("submit", function(event) {
        event.preventDefault();
        var id = $("#updateId").val();
        var nome = $("#updateNome").val();
        var sexo = $("#updateSexo").val();
        var idade = $("#updateIdade").val();
        var cidade = $("#updateCidade").val();
        $.ajax({
            url: "update_record.php",
            type: "POST",
            data: {
                id: id,
                nome: nome,
                sexo: sexo,
                idade: idade,
                cidade: cidade
            },
            success: function(data) {
                $("#updateForm")[0].reset();
                $("#updateModal").modal("hide");
                loadRecords();
            }
        });
    });

    // Excluir um registro
    $(document).on("click", ".delete-button", function() {
        var id = $(this).data("id");
        if (confirm("Tem certeza que deseja excluir este registro?")) {
            $.ajax({
                url: "delete_record.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    loadRecords();
                }
            });
        }
    });
});
