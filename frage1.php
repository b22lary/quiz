<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
	<link rel="stylesheet" href="style.css">
</head>
<body class="bodyFrage1">
	<div class="quiz-container">
		<h1>Augsburg Quiz - Frage 1</h1>
		<hr>
			<form action = "frage1.php" method = "post" id="quiz-form">
					<div class="question">
						<p> Wer hat das Rathaus gebaut?</p>
						<div class="answers">
							<label>
								<input type="radio" value="true" name="Architekten">
								Elias Holl 
							</label>
							<label>
								<input type="radio" value="false" name="Architekten">
								Burkhart Engelberg
							</label>
							<label>
								<input type="radio" value="false" name="Architekten">
								Jakob Fugger
							</label>		
						</div>
					</div>
				<input type="submit" value="weiter" name="weiter" id="submit-btn">
			</form>
	</div>

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
