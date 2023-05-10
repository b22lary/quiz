<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
</head>
<body>
    <p>Frage 4</p>
	<p>Welche Nuss ist in Augsburg besonders berühmt?</p>

	<form action="frage4.php" method = post>

		<label> Ihre Antwort: </label><input type="test" name="Eingabe"><br>
		<input type="submit" value="weiter" name = "weiter">

	</form>
	<?php
	session_start();
	$name = $_SESSION['name'];
	echo $name;

    if(isset($_POST['weiter'])){
        if(isset($_POST['Eingabe'])){
            $eingabe = $_POST['Eingabe'];
            if($eingabe == "Zirbelnuss" || $eingabe == "zirbelnuss"){
                try{
                    $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
                    $username = 'root';
                    $password = '';
                    $dbh = new \PDO($dsn, $username, $password);
                    
                    $statement = $dbh->prepare("UPDATE quizdaten SET frage4 = true WHERE benutzername = '$name'");
                    $statement->execute(); 
                    header("Location: frage5.php");
    
                }catch(\Throwable $e){
            
                }
            }else{
            try{
                $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
                $username = 'root';
                $password = '';
                $dbh = new \PDO($dsn, $username, $password);
                
                $statement = $dbh->prepare("UPDATE quizdaten SET frage4 = false WHERE benutzername = '$name'");
                $statement->execute(); 
                header("Location: frage5.php");

            }catch(\Throwable $e){
        
            }
        }
        }
    }
	?>
</body>
</html>
