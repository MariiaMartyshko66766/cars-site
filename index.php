<?php
$conn = new mysqli("localhost", "root", "", "cars_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $year = $_POST["year"];

        $conn->query("INSERT INTO cars (brand, model, year) VALUES ('$brand','$model','$year')");
    }

    if (isset($_POST["delete"])) {
        $id = $_POST["id"];
        $conn->query("DELETE FROM cars WHERE id=$id");
    }
}

$result = $conn->query("SELECT * FROM cars");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Baza Samochodów</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <div>CarsDB</div>
</nav>

<h1>Baza Samochodów</h1>
<p>Martyshko Mariia 66766</p>

<form method="POST" class="form">
  <input name="brand" placeholder="Marka" required>
  <input name="model" placeholder="Model" required>
  <input name="year" placeholder="Rok" required>
  <button name="add">Dodaj</button>
</form>

<div class="container">

<?php while($row = $result->fetch_assoc()): ?>
  <div class="card">
    <h3><?= $row["brand"] ?> <?= $row["model"] ?></h3>
    <p>Rok: <?= $row["year"] ?></p>

    <form method="POST">
      <input type="hidden" name="id" value="<?= $row["id"] ?>">
      <button name="delete">Usuń</button>
    </form>
  </div>
<?php endwhile; ?>

</div>

</body>
</html>
