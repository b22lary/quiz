<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset ="utf-8">
	<meta name = "author" content = "Larissa, Nina, Lucas">
	<title>Augsburg Quiz</title>
</head>

<body>
    
    <label for="benutzername">Benutzername: </label>
    <input type="text" id="name" name="nameInput">
    <button onclick="submit()">Login</button>


    <script>
        let eingabe = document.querySelector('#name')

        function submit(){
            if (eingabe.value) {
                let xhr = new XMLHttpRequest();
                xhr.open('POST', 'get_name.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200 && xhr.responseText) {
                        console.log(xhr.responseText);
                    } else {
                        console.error('Fehler beim Verarbeiten der Daten.');
                    }
                };
                xhr.send('nameInput=' + encodeURIComponent(eingabe.value));
            }
        }
    </script>
</body>
</html>
