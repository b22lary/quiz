<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
	<link rel="stylesheet" href="style.css">
</head>
<body class="bodyFrage1Frage2">
	<div class="quiz-container">
		<h1>Augsburg Quiz - Frage 2</h1>
		<hr>
			<form action="frage2.php" method = post id="quiz-form">
				<div class="question">
					<p>Was ist der "Stoinerne Mo in der Hand"?</p>
					<div class="answers">
						<label>
							<input type="radio" value="false" name="Stoinerne_Mo">
							Warze an der Hand
						</label>
						<label>
							<input type="radio" value="true" name="Stoinerne_Mo">
							Brotzeit
						</label>
						<label>
							<input type="radio" value="false" name="Stoinerne_Mo">
							Vertrocknetes Moß
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
