<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Database connection is OK<br>";

if (isset($_POST["temperature"]) && isset($_POST["humidity"])) {

    $suhu = $_POST["temperature"];
    $lembab = $_POST["humidity"];

    $sql = "INSERT INTO suhu (suhu, humidity) VALUES (" . $suhu . ", " . $lembab .")";

    if (mysqli_query($conn, $sql)) {
        echo "\nNew record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
