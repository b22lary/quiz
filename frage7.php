<!DOCTYPE html>
<html lang="de">
    
	<head>
		<meta charset ="utf-8">
		<meta name = "author" content = "Larissa, Nina, Lucas">
		<title>Augsburg Quiz</title>

	</head>
	<style>
		figure{
			display:inline-block;
			text-align: center;
		}
		fieldset{
			min-height: 500px;
		}
		section{
			width:33%;
			float: left;
		}
		/*nicht das fieldset auf 33% setzen, weil dann immer noch nur 2 Spalten hinpassen, weil der Rand mitgerechnet wird. Bei der Section wird nun der Inhalt (also die Fieldsets) auf 33% gestellt.*/
		footer{
			clear: left;
			padding-top:5px;
		}
		[highlight] {
			border-color: red;
			border-style: dashed;
		}
</style>

<?php
	session_start();
	$name = $_SESSION['name'];
	echo $name;

	if (isset($_POST["weiter"])){
		$richtig = $_POST['richtigInput'];

		if($richtig){
			try {
				$dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
				$username = 'root';
				$password = '';
				$dbh = new \PDO($dsn, $username, $password);
  
				$statement = $dbh->prepare("UPDATE quizdaten SET frage7 = true WHERE benutzername = '$name'");
				$statement->execute(); 
    
				header("Location: frage8.php");
				exit();
			} catch (\Throwable $e) {
				// Fehlerbehandlung
			}
		}
		else
		{
			try {
				$dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
				$username = 'root';
				$password = '';
				$dbh = new \PDO($dsn, $username, $password);
  
				$statement = $dbh->prepare("UPDATE quizdaten SET frage7 = false WHERE benutzername = '$name'");
				$statement->execute(); 
  
				header("Location: frage8.php");
				exit();
			} catch (\Throwable $e) {
				// Fehlerbehandlung
			}
		}

	}
?>

    <body>
        <header title="Bilder">
		<p>Ordnen Sie die Bilder passend per Drag and Drop ins richtige Feld ein.! Pro Kasten sind 3 Bilder nötig.</p>
			<?php     

                foreach (scandir('images') as $file)
                    if (is_file("images/$file"))
                    {
						$basename=preg_replace('/.jfif/', '', $file);
                        $caption=ucfirst($basename);

                        echo "
                    <figure id='$basename'>
                    <img src='images/$file' height='100' alt='$caption'/>
                    <figcaption>$caption</figcaption>
                    </figure>" . PHP_EOL;
                    }
                //was in Java das Plus ist zum Verketten von Text ist bei PHP der Punkt "."
            ?>
         </header>
         <main title="Content">
		 
			<?php
                function create_category($cat)
                {
                    echo 
"             		  <section title='$cat'>
                  		  <fieldset id = '$cat' title='$cat'>
                  	      <legend>$cat</legend>
                  		  </fieldset>
               		  </section>" . PHP_EOL;
                }

                create_category('Stadt Augsburg');
                create_category('Umkreis Augsburg');
                create_category('weit entfernt');
            ?>

        </main>

        <footer title="Quellen">
			<form action="frage7.php" method = "post">
				<input type="submit" value="weiter" name="weiter">
				<input type="submit" id= "richtigInput" name ="richtigInput" value="false">

			</form>
        </footer>

        <script>
			var x;
			var y;
			var array = [false, false, false, false, false, false, false, false, false];
			var allesRichtig = false;

			let fieldsets=document.querySelectorAll('fieldset')
			let figures=document.querySelectorAll('figure')
			//dragstart (Beginn einer Drag&Drop Operation)
			//dragover (Zeigt an, dass ein gedraggedtes Objekt über einem potentiellen Ziel ist)
			//drop (Element wird fallen gelassen, über passendem Ziel)

			figures.forEach(item =>{
			item.setAttribute('draggable', true)
			item.addEventListener('dragstart', event =>{
					event.dataTransfer.setData('application/figure-id', item.id)
				})
			})

			fieldsets.forEach(item=>{
				item.addEventListener('dragover', event =>
				event.preventDefault())

				item.addEventListener('dragenter', event =>
				item.setAttribute('highlight', true))

				item.addEventListener('dragleave', event =>
				item.removeAttribute('highlight'))

				item.addEventListener('drop', event =>{
					//item.removeAttribute('highlight')
					let id= event.dataTransfer.getData('application/figure-id')
					let stadt=document.querySelector('#Stadt Augsburg')
					if (id){
						item.appendChild(document.getElementById(id))
								
						function getOffset( el ) {
							var _x = 0;
							var _y = 0;
							while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
								_x += el.offsetLeft - el.scrollLeft;
								_y += el.offsetTop - el.scrollTop;
								el = el.offsetParent;
							}
							return { top: _y, left: _x };
						}

						x = getOffset( document.getElementById(id) ).left;
						y = getOffset( document.getElementById(id) ).top;
						console.log("x: "+ x);
						console.log("y: "+ y);

						checkCorrect(id);

						allesRichtig = array.every(element => element === true);
						document.getElementById("richtigInput").value = allesRichtig;
						}	
					})
				})


			function checkCorrect(id){
				switch(id) {
  					case "Fuggerei":
						if (x < 300) {
  							array[0]=true;
						}
						else{
							array[0]=false;
						}
					break;
 					case "Maiskolben":
						if (x < 300) {
 					  		array[1]=true;
						}
						else{
							array[1]=false;
						}
   					 break;
 					case "Rathaus":
						if (x < 300) {
							array[2]=true;
						}
						else{
							array[2]=false;
						}
   					 break;
					case "Café Müller":
						if (x >= 300 && x < 850){
  							array[3]=true;
						}
						else{
							array[3]=false;
						}
					break;
 					case "Mandichosee":
						if (x >= 300 && x < 850){
							array[4]=true;
						}
						else{
							array[4]=false;
						}
   					break;
 					case "Mercateum":
						if (x >= 300 && x < 850){
							array[5]=true;
						}
						else{
							array[5]=false;
						}
   					break;
					case "Altstadt":
						if (x >= 700){
  							array[6]=true;
						}
						else{
							array[6]=false;
						}
					break;
 					case "Kirche":
						if (x >= 700){
							array[7]=true;
						}
						else{
							array[7]=false;
						}
   					break;
 					case "Stadtbrunnen":
						if (x >= 700){
							array[8]=true;
						}
						else{
							array[8]=false;
						}
   					break;
			}
			console.log(array);	
		}

		</script>


    </body>
</html>
