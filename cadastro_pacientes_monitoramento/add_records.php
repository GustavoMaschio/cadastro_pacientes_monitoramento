<?php
$conn = pg_connect("host=seu_host dbname=seu_banco_de_dados user=seu_usuario password=seu_senha");

function createWithAdditionalInfo($nome, $sexo, $idade, $cidade) {
    global $conn;
    $frequencia_cardiaca = rand(60, 100);  // Valor aleatório de 60 a 100 bpm
    $pressao = rand(90, 140) . '/' . rand(60, 90);  // Valor aleatório para pressão arterial
    $temperatura_corporal = rand(360, 380) / 10;  // Valor aleatório de 36 a 38 graus Celsius
    $saturacao_oxigenio = rand(95, 100);  // Valor aleatório de 95% a 100%

    $insertSQL = "INSERT INTO pessoas (nome, sexo, idade, cidade, frequencia_cardiaca, pressao, temperatura_corporal, saturacao_oxigenio)
                  VALUES ('$nome', '$sexo', $idade, '$cidade', $frequencia_cardiaca, '$pressao', $temperatura_corporal, $saturacao_oxigenio)";
    pg_query($conn, $insertSQL);
}

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$idade = $_POST['idade'];
$cidade = $_POST['cidade'];

createWithAdditionalInfo($nome, $sexo, $idade, $cidade);
