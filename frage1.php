<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
</head>
<body>
    <p>Frage 1</p>
	<p> Wer hat das Rathaus gebaut?</p>
	<form action = "frage1.php" method = "post">

		<input type="radio" value="true" name="Architekten"><label> Elias Holl </label><br>
		<input type="radio" value="false" name="Architekten"><label> Burkhart Engelberg </label><br>
		<input type="radio" value="false" name="Architekten"><label> Jakob Fugger </label><br>
		<input type="submit" value="weiter" name="weiter">

	</form>
	
	<?php
	session_start();
	$name = $_SESSION['name'];
	echo $name;

	if (isset($_POST["weiter"])){
		
		if (isset ($_POST['Architekten'])){
			if ($_POST['Architekten']=="true"){
				
				try{
				$dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
				$username = 'root';
				$password = '';
				$dbh = new \PDO($dsn, $username, $password);
				
				$statement = $dbh->prepare("UPDATE quizdaten SET frage1 = true WHERE benutzername = '$name'");
				$statement->execute(); 
				header("Location: frage2.php");

			}catch(\Throwable $e){
		
			}
			}
			if ($_POST['Architekten']=="false"){
				try{
					$dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
					$username = 'root';
					$password = '';
					$dbh = new \PDO($dsn, $username, $password);
					
					$statement = $dbh->prepare("UPDATE quizdaten SET frage1 = false WHERE benutzername = '$name'");
					$statement->execute(); 
					header("Location: frage2.php");
	
				}catch(\Throwable $e){
			
				}
			}
		}
	}
	?>
	
</body>
</html>
