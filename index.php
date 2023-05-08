<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
</head>

<body>
    <form action="index.php" method="post">
        <label for="benutzername">Benutzername: </label>
        <input type="text" id="name" name="nameInput">
       <!-- <a href="C:\xampp\htdocs\quiz\frage1.php"><input type="submit" value="Login und Quiz starten"></a>-->
        <input type="submit" value="Login und Quiz starten">
        <button onclick="openNewPage()"> Next </button>
    </form>

<script>
    function openNewPage(){
        window.location.href="C:\xampp\htdocs\quiz\frage1.php";
    }
</script>

<?php
if (!empty ($_POST)){
    $name = $_POST['nameInput'];

    try{
        $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
        $username = 'root';
        $password = '';
        $dbh = new \PDO($dsn, $username, $password);
        
        $statement = $dbh->prepare("INSERT INTO quizdaten(benutzername, frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, endergebnis) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array($name,true,false,true,true,true,true,true,true,8));   
    }catch(\Throwable $e){

    }
}
?>
</body>
</html>