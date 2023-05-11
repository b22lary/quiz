<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bodyIndex">
    <div class="login-wrapper">
        <form action="index.php" method="post" class="form">
            <h2>Login</h2>
            <div class="input-group">
                <input type="text" id="name" name="nameInput" required>
                <label for="benutzername">Benutzername: </label>
            </div>
            <input type="submit" value="Login und Quiz starten" class="submit-btn">
        </form>
    </div>
<?php
session_start();
if (!empty($_POST)) {
    $name = $_POST['nameInput'];

    try {
        $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
        $username = 'root';
        $password = '';
        $dbh = new \PDO($dsn, $username, $password);

        $statement = $dbh->prepare("INSERT INTO quizdaten(benutzername, frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, endergebnis) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array($name, null, null, null, null, null, null, null, null, 0));

        $_SESSION['name'] = $name;

        header("Location: frage1.php");
        exit();
    } catch (\Throwable $e) {
        // Fehlerbehandlung
    }
}
?>
</body>
</html>
