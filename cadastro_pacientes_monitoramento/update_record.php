<?php
$conn = pg_connect("host=seu_host dbname=seu_banco_de_dados user=seu_usuario password=seu_senha");

$id = $_POST['id'];
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$idade = $_POST['idade'];
$cidade = $_POST['cidade'];

$query = "UPDATE pessoas SET nome = '$nome', sexo = '$sexo', idade = $idade, cidade = '$cidade' WHERE id = $id";
pg_query($conn, $query);
?>
