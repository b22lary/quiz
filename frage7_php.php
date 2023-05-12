<?php
    session_start();
	$name = $_SESSION['name'];
    echo $_SESSION['nameInput'];
	echo $name;


if (isset($_POST['nameInput'])) {
    $nameInput = $_POST['nameInput'];
    echo $nameInput;
    
    if ($nameInput == "true"){
        try{
        $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
        $username = 'root';
        $password = '';
        $dbh = new \PDO($dsn, $username, $password);
        
        $statement = $dbh->prepare("UPDATE quizdaten SET frage7 = true WHERE benutzername = '$name'");
        $statement->execute(); 
        

        }catch(\Throwable $e){

        }
    }else{
        try{
            $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
            $username = 'root';
            $password = '';
            $dbh = new \PDO($dsn, $username, $password);
            
            $statement = $dbh->prepare("UPDATE quizdaten SET frage7 = false WHERE benutzername = '$name'");
            $statement->execute(); 
            
    
            }catch(\Throwable $e){
    
            }
    }
}

?>
