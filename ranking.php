<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bodyFragen">
    <div class="quiz-container">
        <h1>Augsburg Quiz - Ranking</h1>
        <hr>
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
            echo"
            <tr>
                    <th>Name</th>
                    <th>Punktzahl </th>
            </tr>";
            foreach($dbh-> query($sql) as $row){
                echo"
                
                    <td>" . $row['benutzername'] ."</td>
                    <td>" . $row['endergebnis'] ."</td>
                </tr>
                ";
            }
        ?>
        </table>
        <button onclick="submit()" type="submit" id="submit-btn">Quiz neu starten</button>   
        <input type="text" id="nameInput" name="nameInput" value="" hidden>
<script>
    function submit(){
        window.location.href = "index.html";
    }
</script>

</body>
</html>
