<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
</head>
<body>
   <h1> Ergebnis!!!</h1>

    <table>
        <tr>
         <th>Frage</th>
         <th>Ergebnis</th>
        </tr>
        <tr>
            <td>Wer hat das Rathaus gebaut?</td>
            <td id = 'a1'></td>
        </tr>
        <tr>
            <td>Was hat der "Stoinerne Mo" in der Hand?</td>
            <td id = 'a2'></td>
        </tr>
        <tr>
            <td>In welchem Jahr wurde die Fuggerei von Jakob Fugger gestiftet?</td>
            <td id = 'a3'></td>
        </tr>
        <tr>
            <td>Welche Nuss ist in Augsburg besonders berühmt?</td>
            <td id = 'a4'></td>
        </tr>
        <tr>
            <td>Welche Gestalten sind nicht auf dem romanischen Glasfenstern im Augsburger Dom?</td>
            <td id = 'a5'></td>
        </tr>
        <tr>
            <td>Was sind alles Figuren der Augsburger Puppenkiste?</td>
            <td id = 'a6'></td>
        </tr>
        <tr>
            <td>Ordnen Sie die Bilder passend per Drag and Drop ins richtige Feld ein!</td>
            <td id = 'a7'></td>
        </tr>
        <tr>
            <td>Was ist das UNESCO Weltkulturerbe von Augsburg?</td>
            <td id = 'a8'></td>
        </tr>
    </table>

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

        $sql = "SELECT * FROM quizdaten";
        echo $sql;


    ?>
</body>
</html>