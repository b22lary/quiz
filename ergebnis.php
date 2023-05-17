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
                <td>1: Wer hat das Rathaus gebaut?</td>
                <td class='mittig'>$f1</td>
            </tr>
            <tr>
                <td>2: Was hat der 'Stoinerne Mo' in der Hand?</td>
                <td class='mittig'>$f2</td>
            </tr>
            <tr>
                <td>3: In welchem Jahr wurde die Fuggerei von Jakob Fugger gestiftet?</td>
                <td class='mittig'>$f3</td>
            </tr>
            <tr>
                <td>4: Welche Nuss ist in Augsburg besonders berühmt?</td>
                <td class='mittig'>$f4</td>
            </tr>
            <tr>
                <td>5: Welche Gestalten sind nicht auf dem romanischen Glasfenstern im Augsburger Dom?</td>
                <td class='mittig'>$f5</td>
            </tr>
            <tr>
                <td>6: Welche Figuren gehören zur Augsburger Puppenkiste?</td>
                <td class='mittig'>$f6</td>
            </tr>
            <tr>
                <td>7: Ordnen Sie die untenstehenden Bilder passend per Drag and Drop ins richtige Feld ein!</td>
                <td class='mittig'>$f7</td>
            </tr>
            <tr>
                <td>8: Was ist das UNESCO Weltkulturerbe von Augsburg?</td>
                <td class='mittig'>$f8</td>
            </tr>
            <tr>
                <td>Gesamtpunktzahl</td>
                <td class='mittig'>$counter / 8</td>
            </tr>
        ";
        }
        else{
            echo "Keine Daten";
        }

        mysqli_close($conn);
    ?>
    </table>
    <button onclick="submit()" type="submit" id="submit-btn">Weiter</button>   
    <input type="text" id="nameInput" name="nameInput" value="" hidden>
<script>
    function submit(){
        window.location.href = "ranking.php";
    }
</script>
</body>
</html>