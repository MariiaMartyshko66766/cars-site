<?php
session_start();

$error = "";

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "mariia" && $password == "66766") {

        $_SESSION["user"] = $username;

        header("Location: index.php");
        exit();

    } else {
        $error = "Nieprawidłowy login lub hasło";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Logowanie</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">

<h1>Logowanie</h1>

<form method="POST">

<input type="text" name="username" placeholder="Login" required>

<input type="password" name="password" placeholder="Hasło" required>

<button name="login">Zaloguj</button>

</form>

<p><?= $error ?></p>

</div>

</body>
</html>
