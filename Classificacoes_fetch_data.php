<?php
// Database connection
$servername = 'ave.dee.isep.ipp.pt';
$username = '1201034';
$dbpassword = 'MWY2MzMxMDdiMWQ2';
$dbname = '1201034';

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, posicao, nome, tempo FROM classificacoes";
$result = $conn->query($sql);

$classificacoes = [];

if ($result->num_rows > 0) {
    // Output de dados de cada linha
    while($row = $result->fetch_assoc()) {
        $classificacoes[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

echo json_encode($classificacoes);
?>
