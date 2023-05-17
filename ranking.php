<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<table>
<?php
    session_start();
    $name = $_SESSION['name'];


    $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
    $username = 'root';
    $password = '';
    $dbh = new \PDO($dsn, $username, $password);

    $conn = mysqli_connect('localhost',$username,$password,'quiz');

    if(!$conn)
    {
        die("Verbindung fehlgeschlagen!");
    }

    $sql = "SELECT * FROM quizdaten ORDER BY (endergebnis) DESC";
    $result = mysqli_query($conn, $sql);


    foreach($dbh-> query($sql) as $row){
        echo"
        <tr>
            <td>" . $row['benutzername'] ."</td>
            <td>" . $row['endergebnis'] ."</td>
        </tr>
        ";
    }
?>
</table>

</body>
