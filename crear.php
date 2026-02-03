<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Formulario</title>
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

        <input type="submit" value="Enviar">
    </form>
</body>
</html>