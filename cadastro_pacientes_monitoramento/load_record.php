<?php
$conn = pg_connect("host=seu_host dbname=seu_banco_de_dados user=seu_usuario password=seu_senha");

$query = "SELECT * FROM pessoas";
$result = pg_query($conn, $query);

if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["sexo"] . "</td>";
        echo "<td>" . $row["idade"] . "</td>";
        echo "<td>" . $row["cidade"] . "</td>";

        $frequencia_cardiaca = $row["frequencia_cardiaca"];
        if ($frequencia_cardiaca < 60 || $frequencia_cardiaca > 100) {
            echo "<td class='out-of-scope'>" . $frequencia_cardiaca . " BPM</td>";
        } else {
            echo "<td>" . $frequencia_cardiaca . " BPM</td>";
        }

        $pressao = $row["pressao"];
        $pressao_parts = explode('/', $pressao);
        $systolic = (int) $pressao_parts[0];
        $diastolic = (int) $pressao_parts[1];
        if ($systolic < 90 || $systolic > 140 || $diastolic < 60 || $diastolic > 90) {
            echo "<td class='out-of-scope'>" . $pressao . "</td>";
        } else {
            echo "<td>" . $pressao . "</td>";
        }

        $temperatura_corporal = $row["temperatura_corporal"];
        if ($temperatura_corporal < 36 || $temperatura_corporal > 38) {
            echo "<td class='out-of-scope'>" . $temperatura_corporal . "°C</td>";
        } else {
            echo "<td>" . $temperatura_corporal . "°C</td>";
        }

        $saturacao_oxigenio = $row["saturacao_oxigenio"];
        if ($saturacao_oxigenio < 95 || $saturacao_oxigenio > 100) {
            echo "<td class='out-of-scope'>" . $saturacao_oxigenio . " %</td>";
        } else {
            echo "<td>" . $saturacao_oxigenio . " %</td>";
        }

        echo "<td>";
        echo "<button class='btn btn-warning update-button' data-id='" . $row["id"] . "' data-nome='" . $row["nome"] . "' data-sexo='" . $row["sexo"] . "' data-idade='" . $row["idade"] . "' data-cidade='" . $row["cidade"] . "'>Atualizar</button> ";
        echo "<button class='btn btn-danger delete-button' data-id='" . $row["id"] . "'>Excluir</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>Nenhum registro encontrado.</td></tr>";
}
?>
