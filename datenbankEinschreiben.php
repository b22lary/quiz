<?php
try{
	
	$dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
	$username = 'root';
	$password = '';
	$dbh = new \PDO($dsn, $username, $password);
	
	$statement = $dbh->prepare("INSERT INTO quizdaten(benutzername, frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, endergebnis) VALUES(?,?,?,?,?,?,?,?,?,?)");
	$statement->execute(array("larissa",true,false,true,true,true,true,true,true,8));
}catch(\Exception $e){
	die('Interner Fehler');
}

?>