<?php
$host = "seu_host";
$port = "sua_porta";
$dbname = "seu_banco_de_dados";
$user = "seu_usuario";
$password = "sua_senha";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Conexão falhou");
}

// SQL para criar tabela
$sql = "CREATE TABLE IF NOT EXISTS sua_tabela (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sexo VARCHAR(10) NOT NULL,
    idade INT NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    frequencia_cardiaca INT NOT NULL,
    pressao VARCHAR(20) NOT NULL,
    temperatura_corporal DECIMAL(3,1) NOT NULL,
    saturacao_oxigenio INT NOT NULL
)";

$result = pg_query($conn, $sql);

if ($result) {
    echo "Tabela criada com sucesso";
} else {
    echo "Erro ao criar tabela: " . pg_last_error($conn);
}

pg_close($conn);
?>
