<?php
$servername = 'ave.dee.isep.ipp.pt';
$username = '1201034';
$dbpassword = 'MWY2MzMxMDdiMWQ2';
$dbname = '1201034';

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ids = $_POST['id'];
    $names = $_POST['name_sign_up'];
    $emails = $_POST['email_sign_up'];
    $roles = $_POST['role'];

    foreach ($ids as $index => $id) {
        $name = $conn->real_escape_string($names[$index]);
        $email = $conn->real_escape_string($emails[$index]);
        $role = $conn->real_escape_string($roles[$index]);

        $sql = "UPDATE registration_sign_up SET name_sign_up='$name', email_sign_up='$email', Role='$role' WHERE id=$id";
        $conn->query($sql);
    }

    header("Location: Administrador.php");
}

$conn->close();
?>
