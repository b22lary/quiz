<!DOCTYPE html>
<html lang="de">    
	<head>
		<meta charset ="utf-8">
		<meta name = "author" content = "Larissa, Nina, Lucas">
		<title>Augsburg Quiz</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body class="bodyFrage7">
		<div class="quiz-container">
			<h1>Augsburg Quiz - Frage 7</h1>
			<hr>
			<div class="quiz-form">
				<div class="question">
					<p>Ordnen Sie die untenstehenden Bilder passend per Drag and Drop ins richtige Feld ein! <br><br>
					<span style="font-size:smaller">Pro Kasten sind 3 Bilder nötig. Orientieren Sie sich an den Bildern, nicht an den Namen!<span></p>
				</div>
				<button type="submit" value="weiter" name="weiter" onclick="submit()" id="submit-btn2">Weiter</button>
				<input type="text" id="nameInput" name="nameInput" value="false" hidden>
			</div>
		</div>
		<main title="Content" class=bodyFrage71>
			
        
         
		 
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
        </main>

        <footer title="Quellen">
			
				

        </footer>

        <script>
					var x;
			var y;
			var array = [false, false, false, false, false, false, false, false, false];
			var allesRichtig = false;
			let eingabe = document.getElementById("nameInput")

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

						document.getElementById("nameInput").value = array.every(element => element === true);
						eingabe = nameInput;

						console.log(eingabe)
						}	
					})
				})


				function submit(){
					
					console.log(eingabe)

					let xhr = new XMLHttpRequest();
					xhr.open('POST', 'frage7.php');
					xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
					xhr.send('nameInput=' + encodeURIComponent(nameInput.value));
					console.log(nameInput.value)
					window.location.href = "frage8.html";
						
				}


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

		document.addEventListener("keyup", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                submit();
            }
        });
        
		</script>


    </body>
</html>
