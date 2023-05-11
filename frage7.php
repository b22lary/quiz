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
		[hightlight] {
			border-color: red;
			border-style: dashed;
		}
</style>
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
                    <image src='images/$file' height='100' witdh='100' alt='$caption'>
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
                  		  <fieldset id = '$cat'>
                  	      <legend>$cat</legend>
                  		  </fieldset>
               		  </section>" . PHP_EOL;
                //Anstelle von einem Umbruch den PHP_EOL-Befehl verwenden oder auch Tabulatoren zum Formatieren "\t"
                }

                create_category('Stadt Augsburg');
                create_category('Umkreis Augsburg');
                create_category('weit entfernt');
            ?>

        </main>

        <footer title="Quellen">
			<form action="frage7.php" method = post>
				<input type="submit" value="weiter" name="weiter">
			</form>
        </footer>
		
        <script>
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
					item.setAttribute('hightlight', true))

					item.addEventListener('dragleave', event =>
					item.removeAttribute('highlight'))

					item.addEventListener('drop', event =>{
						item.removeAttribute('highlight')
						let id= event.dataTransfer.getData('application/figure-id')
						let stadt=document.querySelector('Stadt Augsburg')
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

							var x = getOffset( document.getElementById(id) ).left;
							var y = getOffset( document.getElementById(id) ).top;
							console.log("x: "+ x);
							console.log("y: "+ y);

							let array = [];

							if (x<300){
								if(id == "Fuggerei"){
									console.log(true);
									console.log(id);
									array[0]=true;
								}else if(id == "Maiskolben"){
									console.log(true);
									console.log(id);
									array[1]=true;
								}else if(id == "Rathaus"){
									console.log(true);
									console.log(id);
									array[2]=true;
									console.log(array[2])
								}
								else{
									console.log(false);
									console.log(id);
								}
							}
							else if(x>=300 && x<850){
								if(id == "Café Müller" || id == "Mandichosee" || id == "Mercateum"){
									console.log(true);
									console.log(id);
								}
								else{
									console.log(false);
									console.log(id);
								}
							}
							else if(x>=700){
								if(id == "Altstadt" || id == "Kirche" || id == "Stadtbrunnen"){
									console.log(true);
									console.log(id);
								}
								else{
									console.log(false);
									console.log(id);
								}	
							}				
						}
						
					})
				})

		</script>

<?php
	session_start();
	$name = $_SESSION['name'];
	echo $name;

	if (isset($_POST["weiter"])){
		if($name == 'test'){
			try {
				$dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8mb4';
			  $username = 'root';
				 $password = '';
			  $dbh = new \PDO($dsn, $username, $password);
  
			  $statement = $dbh->prepare("UPDATE quizdaten SET frage7 = true WHERE benutzername = '$name'");
			  $statement->execute(); 
  
			  $_SESSION['name'] = $name;
  
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
  
			  $_SESSION['name'] = $name;
  
				 header("Location: frage8.php");
			  exit();
		  } catch (\Throwable $e) {
			  // Fehlerbehandlung
		  }
		}
	}
	?>
    </body>
</html>
