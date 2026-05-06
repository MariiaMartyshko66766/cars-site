<?php
$conn = new mysqli("localhost", "root", "", "cars_db");
if ($conn->connect_error) {
    die("Błąd połączenia");
}
?>
