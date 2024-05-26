<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_sign_up = $_POST['name_sign_up'];
    $email_sign_up = $_POST['email_sign_up'];
    $password_sign_up = $_POST['password_sign_up'];

    // Verifica se email e password não estão vazios
    if (empty($name_sign_up) || empty($email_sign_up) || empty($password_sign_up)) {
        echo "Nome, email e password são obrigatórios!";
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
        $stmt = $conn->prepare("INSERT INTO registration_sign_up (name_sign_up, email_sign_up, password_sign_up) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sss", $name_sign_up, $email_sign_up, $password_sign_up); //sss é o número de parâmetros
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
