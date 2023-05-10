<!DOCTYPE html>
<html lang="de">
    
	<head>
        <meta charset="utf-8" name="author" content="L.Bergsiek">
        <meta name="description" content="Übung 2 / Aufgabe 4">
        <title>Quiz</title>
        <link rel="stylesheet" href="Aufgabe5.css">
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
"               <section title='$cat'>
                    <fieldset>
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
            Icons erstellt von <a href="https://www.freepik.com" title="Freepik">Freepik</a>
            from <a href="https://www.flaticon.com/de/" title="Flaticon">www.flaticon.com</a>
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
						console.log(item.id)
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
						if (id){
							item.appendChild(document.getElementById(id))
						}
					})
				})
		</script>
    </body>
</html>
