<?php
    if(isset($_POST['nameInput'])) {
        $name = $_POST['nameInput'];
        echo $name;

        try {
            $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
            $username = 'root';
            $password = '';
            $dbh = new \PDO($dsn, $username, $password);
    
            $statement = $dbh->prepare("INSERT INTO quizdaten(benutzername, frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, endergebnis) VALUES(?,?,?,?,?,?,?,?,?,?)");
            $statement->execute(array($name, null, null, null, null, null, null, null, null, 8));
    
            $_SESSION['name'] = $name;
    
            header("Location: frage1.php");
            exit();
        } catch (\Throwable $e) {
            // Fehlerbehandlung
        }
        
    }
?>
