<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
</head>
<body>
    <p>Frage 5</p>
	<p>Welche Gestalten sind nicht auf dem romanischen Glasfenstern im Augsburger Dom?</p>

	<form action="frage5.php" method = post>
	
		<input type="checkbox" value="1" name="Jona"><label> Jona </label><br>
		<input type="checkbox" value="2" name="Johann"><label> Johann </label><br>
        <input type="checkbox" value="3" name="Josef"><label> Josef </label><br>
        <input type="checkbox" value="4" name="David"><label> David </label><br>
        <input type="checkbox" value="5" name="Matthäus"><label> Matthäus </label><br>
		<input type="submit" value="weiter" name="weiter">

	</form>
	<?php
	session_start();
	$name = $_SESSION['name'];
	echo $name;
    if (isset($_POST['Jona']) || isset($_POST['Johann']) || isset($_POST['Josef']) || isset($_POST['David']) || isset($_POST['Matthäus'])){
        if(isset($_POST['Johann']) && isset($_POST['Matthäus'])){
            try{
                $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
                $username = 'root';
                $password = '';
                $dbh = new \PDO($dsn, $username, $password);
                
                $statement = $dbh->prepare("UPDATE quizdaten SET frage5 = true WHERE benutzername = '$name'");
                $statement->execute(); 
                header("Location: frage6.php");

            }catch(\Throwable $e){
        
            }
        }else{
            try{
                $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
                $username = 'root';
                $password = '';
                $dbh = new \PDO($dsn, $username, $password);
                
                $statement = $dbh->prepare("UPDATE quizdaten SET frage5 = false WHERE benutzername = '$name'");
                $statement->execute(); 
                header("Location: frage6.php");

            }catch(\Throwable $e){
        
            }
        }
    }
    

    
	?>
</body>
</html>
