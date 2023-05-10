<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
</head>
<body>
    <p>Frage 6</p>
	<p>Was sind alles Figuren der Augsburger Puppenkiste?</p>

	<form action="frage6.php" method = post>
	
		<input type="checkbox" value="1" name="Väterchen_Frost"><label> Väterchen Frost </label><br>
		<input type="checkbox" value="2" name="Rumpelstilzchen"><label> Rumpelstilzchen </label><br>
        <input type="checkbox" value="3" name="Urmel"><label> Urmel </label><br>
        <input type="checkbox" value="4" name="Aschenputtel"><label> Aschenputtel </label><br>
        <input type="checkbox" value="5" name="Lukas"><label> Lukas </label><br>
		<input type="submit" value="weiter" name="weiter">

	</form>
	<?php
	session_start();
	$name = $_SESSION['name'];
	echo $name;
    if (isset($_POST['Väterchen_Frost']) || isset($_POST['Rumpelstilzchen']) || isset($_POST['Urmel']) || isset($_POST['Aschenputtel']) || isset($_POST['Lukas'])){
        if(isset($_POST['Lukas']) && isset($_POST['Urmel']) && !isset($_POST['Väterchen_Frost']) && !isset($_POST['Rumpelstilzchen']) && !isset($_POST['Aschenputtel'])){
            try{
                $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
                $username = 'root';
                $password = '';
                $dbh = new \PDO($dsn, $username, $password);
                
                $statement = $dbh->prepare("UPDATE quizdaten SET frage6 = true WHERE benutzername = '$name'");
                $statement->execute(); 
                header("Location: frage7.php");

            }catch(\Throwable $e){
        
            }
        }else{
            try{
                $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
                $username = 'root';
                $password = '';
                $dbh = new \PDO($dsn, $username, $password);
                
                $statement = $dbh->prepare("UPDATE quizdaten SET frage6 = false WHERE benutzername = '$name'");
                $statement->execute(); 
                header("Location: frage7.php");

            }catch(\Throwable $e){
        
            }
        }
    }
    

    
	?>
</body>
</html>
