<?php
$conn = pg_connect("host=seu_host dbname=seu_banco_de_dados user=seu_usuario password=seu_senha");

$id = $_POST['id'];

$query = "DELETE FROM pessoas WHERE id = $id";
pg_query($conn, $query);
?>
