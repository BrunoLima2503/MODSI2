<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica se email e password não estão vazios
    if (empty($email) || empty($password)) {
        echo "Email e password são obrigatórios!";
        exit;
    }

    // Database connection
    $servername = 'ave.dee.isep.ipp.pt';
    $username = '1201034';
    $dbpassword = 'MWY2MzMxMDdiMWQ2';
    $dbname = '1201034';

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration (email, password) VALUES (?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ss", $email, $password);
        $execval = $stmt->execute();

        if ($execval) {
            echo "Registo efetuado com sucesso";
        } else {
            echo "Falha no registo: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>
