<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
</head>
<body>
    <p>Frage 3</p>
	<p>Wann wurde die Fuggerei von Jakob Fugger gestiftet?</p>

	<form action="frage3.php" method = post>

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
            if($eingabe == "1521"){
                try{
                    $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
                    $username = 'root';
                    $password = '';
                    $dbh = new \PDO($dsn, $username, $password);
                    echo "Test";
                    $statement = $dbh->prepare("UPDATE quizdaten SET frage3 = true WHERE benutzername = '$name'");
                    $statement->execute(); 
                    header("Location: frage4.php");
    
                }catch(\Throwable $e){
            
                }
            }else{
            try{
                $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
                $username = 'root';
                $password = '';
                $dbh = new \PDO($dsn, $username, $password);
                echo "Test";
                $statement = $dbh->prepare("UPDATE quizdaten SET frage3 = false WHERE benutzername = '$name'");
                $statement->execute(); 
                header("Location: frage4.php");

            }catch(\Throwable $e){
        
            }
        }
        }
    }
	?>
</body>
</html>
