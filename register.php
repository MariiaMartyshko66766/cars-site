<?php
include "db.php";

$message = "";

if (isset($_POST["register"])) {

    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT * FROM users WHERE username='$username'");

    if ($check->num_rows > 0) {

        $message = "Użytkownik już istnieje";

    } else {

        $conn->query("INSERT INTO users (username, password)
        VALUES ('$username', '$password')");

        $message = "Rejestracja zakończona!";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Rejestracja</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">

<h1>Rejestracja</h1>

<form method="POST">

<input type="text" name="username" placeholder="Login" required>

<input type="password" name="password" placeholder="Hasło" required>

<button name="register">Zarejestruj</button>

</form>

<p><?= $message ?></p>

<a href="login.php" class="logout">Masz konto? Zaloguj się</a>

</div>

</body>
</html>
