<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['selected_cyclists'])) {
        $selectedCyclists = explode(",", $_POST['selected_cyclists']);

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

        $namePlaceholders = implode(',', array_fill(0, count($selectedCyclists), '?'));
        $sql = "SELECT ID, Nome FROM Atleta WHERE Nome IN ($namePlaceholders)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(str_repeat('s', count($selectedCyclists)), ...$selectedCyclists);
        $stmt->execute();
        $result = $stmt->get_result();

        $ids = [];
        while ($row = $result->fetch_assoc()) {
            $ids[$row['Nome']] = $row['ID'];
        }

        $stmt->close();
        $conn->close();

        // Display IDs for demonstration purposes
        foreach ($ids as $name => $id) {
            echo "Cyclist: $name, ID: $id<br>";
        }
    } else {
        echo "No cyclists selected.";
    }
}
?>
