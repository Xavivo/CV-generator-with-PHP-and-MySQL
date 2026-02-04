<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Formulario</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ranchers&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Formulario</h1>
    <form onsubmit="return validateLanguages()" action="guardar.php" method="POST" enctype="multipart/form-data">
        <!-- Labels -->
        <label for="name">Nombre</label>
        <input type="text" name="nombre" id="name" required>

        <label for="apellido1">Primer Apellido</label>
        <input type="text" name="apellido1" id="apellido1" required>

        <label for="apellido2">Segundo Apellido</label>
        <input type="text" name="apellido2" id="apellido2" required>

        <label for="edad">Edad</label>
        <input type="number" name="edad" id="edad" required>

        <label for="ciudad">Ciudad de residencia</label>
        <input type="text" name="ciudad" id="ciudad" required>

        <label for="experiencia">Experiencia laboral</label>
        <textarea placeholder="Háblanos un poco de tí..." name="experiencia" id="experiencia" required></textarea>

        <label for="formacion">Formación académica</label>
        <textarea placeholder="Háblanos sobre tu formación académica..." name="formacion" id="formacion" required></textarea>

        <label for="habilidades">Habilidades</label>
        <textarea placeholder="Háblanos sobre tus habilidades..." name="habilidades" id="habilidades" required></textarea>

        <label for="idiomas">Idiomas</label>
        <input type="checkbox" name="idiomasArray" value="english" id="english"> Inglés<br>
        <input type="checkbox" name="idiomasArray" value="spanish" id="spanish"> Español<br>
        <input type="checkbox" name="idiomasArray" value="french" id="french"> Francés<br>
        <input type="checkbox" name="idiomasArray" value="german" id="german"> Alemán<br>
        <input type="checkbox" name="idiomasArray" value="italian" id="italian"> Italiano<br>
        <input type="checkbox" name="idiomasArray" value="portuguese" id="portuguese"> Portugués<br>
        <input type="checkbox" name="idiomasArray" value="chinese" id="chinese"> Chino<br>
        <input type="checkbox" name="idiomasArray" value="japanese" id="japanese"> Japonés<br>
        <input type="checkbox" name="idiomasArray" value="arabic" id="arabic"> Árabe<br>
        <input type="checkbox" name="idiomasArray" value="russian" id="russian"> Ruso<br>
        <input type="checkbox" name="idiomasArray" value="other" id="other"> Otro<br>

        <label for="pfp">Adjunta tu foto de perfil</label>
        <input type="file" name="pfp" id="pfp">

        <button type="submit">Enviar formulario</button>
    </form>
    <script>
        function validateLanguages() {
            const checkboxes = document.querySelectorAll('input[name="idiomasArray"]:checked');
            if (checkboxes.length === 0) {
                alert('Debes seleccionar al menos un idioma.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>