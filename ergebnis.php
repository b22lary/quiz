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
        <h1>Augsburg Quiz - Ergebnis</h1>
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

        $sql = "SELECT * FROM quizdaten WHERE benutzername = '$name'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $f1 = $row["frage1"];
                $f2 = $row["frage2"];
                $f3 = $row["frage3"];
                $f4 = $row["frage4"];
                $f5 = $row["frage5"];
                $f6 = $row["frage6"];
                $f7 = $row["frage7"];
                $f8 = $row["frage8"];
            }
            $counter = $f1 +$f2 +$f3 +$f4 +$f5 +$f6 +$f7 +$f8;

            try{
                $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
                $username = 'root';
                $password = '';
                $dbh = new \PDO($dsn, $username, $password);
                
                $statement = $dbh->prepare("UPDATE quizdaten SET endergebnis = $counter WHERE benutzername = '$name'");
                $statement->execute(); 
                
        
                }catch(\Throwable $e){
        
                }

            if($f1==0){
                $f1="falsch";
            }
            else{
                $f1="richtig";
            }
            if($f2==0){
                $f2="falsch";
            }
            else{
                $f2="richtig";
            }
            if($f3==0){
                $f3="falsch";
            }
            else{
                $f3="richtig";
            }
            if($f4==0){
                $f4="falsch";
            }
            else{
                $f4="richtig";
            }
            if($f5==0){
                $f5="falsch";
            }
            else{
                $f5="richtig";
            }
            if($f6==0){
                $f6="falsch";
            }
            else{
                $f6="richtig";
            }
            if($f7==0){
                $f7="falsch";
            }
            else{
                $f7="richtig";
            }
            if($f8==0){
                $f8="falsch";
            }
            else{
                $f8="richtig";
            }
            echo"
        
            <tr>
                <th>Frage</th>
                <th>Ergebnis</th>
            </tr>
            <tr>
                <td>Wer hat das Rathaus gebaut?</td>
                <td>$f1</td>
            </tr>
            <tr>
                <td>Was hat der 'Stoinerne Mo' in der Hand?</td>
                <td>$f2</td>
            </tr>
            <tr>
                <td>In welchem Jahr wurde die Fuggerei von Jakob Fugger gestiftet?</td>
                <td>$f3</td>
            </tr>
            <tr>
                <td>Welche Nuss ist in Augsburg besonders berühmt?</td>
                <td>$f4</td>
            </tr>
            <tr>
                <td>Welche Gestalten sind nicht auf dem romanischen Glasfenstern im Augsburger Dom?</td>
                <td>$f5</td>
            </tr>
            <tr>
                <td>Welche Figuren gehören zur Augsburger Puppenkiste?</td>
                <td>$f6</td>
            </tr>
            <tr>
                <td>Ordnen Sie die Bilder passend per Drag and Drop ins richtige Feld ein!</td>
                <td>$f7</td>
            </tr>
            <tr>
                <td>Was ist das UNESCO Weltkulturerbe von Augsburg?</td>
                <td>$f8</td>
            </tr>
            <tr>
                <td>Gesamtpunktzahl</td>
                <td>$counter</td>
            </tr>
        ";
        }
        else{
            echo "Keine Daten";
        }

        mysqli_close($conn);
    ?>
    </table>
</body>
</html>