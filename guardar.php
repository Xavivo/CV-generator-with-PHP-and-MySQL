<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Formulario</title>
</head>
<body>
    <h1>Prueba</h1>
    <?php
        $name = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $edad = $_POST['edad'];
        $ciudad = $_POST['ciudad'];
        $experiencia = $_POST['experiencia'];
        $formacion = $_POST['formacion'];
        $habilidades = $_POST['habilidades'];
        $idiomas = isset($_POST['idiomasArray']) ? $_POST['idiomasArray'] : [];
        if (!is_array($idiomas)) {
            $idiomas = [$idiomas];
        } // We make sure $idiomas is always an array to avoid errors
        echo "<h2>Datos recibidos:</h2>";
        echo "Nombre: " . htmlspecialchars($name) . "<br>";
        echo "Apellido 1: " . htmlspecialchars($apellido1) . "<br>";
        echo "Apellido 2: " . htmlspecialchars($apellido2) . "<br>";
        echo "Edad: " . htmlspecialchars($edad) . "<br>";
        echo "Ciudad: " . htmlspecialchars($ciudad) . "<br>";
        echo "Experiencia: " . htmlspecialchars($experiencia) . "<br>";
        echo "Formación académica: " . htmlspecialchars($formacion) . "<br>";
        echo "Habilidades: " . htmlspecialchars($habilidades) . "<br>";
        echo "Idiomas seleccionados: ";
        foreach ($idiomas as $idioma) {
            echo htmlspecialchars($idioma) . ", ";
        }
        // Pfp upload
    ?>
</body>
</html>