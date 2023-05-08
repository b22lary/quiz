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
	<input type="radio" id="1" value="Elias Holl" name="Architekten">
	<label for="1"> Elias Holl </label><br>
	<input type="radio" id="2" value="Burkhart Engelberg" name="Architekten">
	<label for="1"> Burkhart Engelberg </label><br>
	<input type="radio" id="3" value="Jakob Fugger" name="Architekten">
	<label for="1"> Jakob Fugger </label><br>

	<form action="frage2.php">
		<input type="submit" value="weiter">
	</form>

	<?php
	if(isset($_POST['submit'])){
		if (isset($_POST['Architekten'])){
			$auswahl=$_POST['Architekten'];
			echo $auswahl;
			/*try{
				$dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
				$username = 'root';
				$password = '';
				$dbh = new \PDO($dsn, $username, $password);
				
				$statement = $dbh->prepare("INSERT INTO quizdaten(benutzername, frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, endergebnis) VALUES(?,?,?,?,?,?,?,?,?,?)");
				$statement->execute(array($name,$frageEins,false,true,true,true,true,true,true,8));   
			}catch(\Throwable $e){
		
			}*/
		}
	}
	?>
	
</body>
</html>