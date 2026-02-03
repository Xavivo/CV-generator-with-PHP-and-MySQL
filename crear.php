<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Formulario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Formulario</h1>
    <form>
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
        <textarea placeholder="Háblanos sobre tuformación académica..." name="formacion" id="formacion" required></textarea>

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
        <input type="file" name="pfp" id="pfp" required>

        <button type="submit">Enviar formulario</button>
    </form>
</body>
</html>