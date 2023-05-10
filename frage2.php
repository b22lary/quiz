<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
</head>
<body>
    <p>Frage 2</p>
	<p>Was ist der "Stoinerne Mo in der Hand"?</p>

	<form action="frage2.php" method = post>
	
		<input type="radio" value="false" name="Stoinerne_Mo"><label> Warze an der Hand </label><br>
		<input type="radio" value="true" name="Stoinerne_Mo"><label> Brotzeit </label><br>
		<input type="radio" value="false" name="Stoinerne_Mo"><label> Vertrocknetes Moß </label><br>
		<input type="submit" value="weiter" name="weiter">
	</form>
	<?php
	session_start();
	$name = $_SESSION['name'];
	echo $name;

	if (isset($_POST["weiter"])){
		
		if (isset ($_POST['Stoinerne_Mo'])){
			if ($_POST['Stoinerne_Mo']=="true"){
				
				try{
				$dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
				$username = 'root';
				$password = '';
				$dbh = new \PDO($dsn, $username, $password);
				echo "Test";
				$statement = $dbh->prepare("UPDATE quizdaten SET frage2 = true WHERE benutzername = '$name'");
				$statement->execute(); 
				header("Location: frage3.php");

			}catch(\Throwable $e){
		
			}
			}
			if ($_POST['Stoinerne_Mo']=="false"){
				try{
					$dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
					$username = 'root';
					$password = '';
					$dbh = new \PDO($dsn, $username, $password);
					
					$statement = $dbh->prepare("UPDATE quizdaten SET frage2 = false WHERE benutzername = '$name'");
					$statement->execute(); 
					header("Location: frage3.php");
	
				}catch(\Throwable $e){
			
				}
			}
		}
	}
	?>
</body>
</html>
