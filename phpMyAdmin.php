<?php
$servername = "http://ave.dee.isep.ipp.pt/~crc/phpMyAdmin/";  // Usually 'localhost'
$username = "1201034";  // Your database username
$password = "MWY2MzMxMDdiMWQ2";  // Your database password
$dbname = "1201034";  // The database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select all data from the users table
/*$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}*/

// Close connection
$conn->close();
?>
