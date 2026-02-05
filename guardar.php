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
    include 'resources/db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        echo "Idiomas seleccionados: " . implode(", ", array_map('htmlspecialchars', $idiomas));
        
        // Pfp upload
        $fotoPath = isset($_POST['foto_actual']) ? $_POST['foto_actual'] : ''; // Mantener foto vieja si existe

    if (isset($_FILES['pfp']) && $_FILES['pfp']['error'] === 0) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        
        $fileName = uniqid() . "_" . basename($_FILES['pfp']['name']);
        $targetPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['pfp']['tmp_name'], $targetPath)) {
            $fotoPath = $targetPath;
        }
    }

        // Insert in database
        $sql = "INSERT INTO cvs (nombre, apellido1, apellido2, edad, ciudad, experiencia, formacion, habilidades, idiomas, foto) 
            VALUES (:nombre, :apellido1, :apellido2, :edad, :ciudad, :experiencia, :formacion, :habilidades, :idiomas, :foto)";
    
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $name,
            ':apellido1' => $apellido1,
            ':apellido2' => $apellido2,
            ':edad' => $edad,
            ':ciudad' => $ciudad,
            ':experiencia' => $experiencia,
            ':formacion' => $formacion,
            ':habilidades' => $habilidades,
            ':idiomas' => implode(',', $idiomas),
            ':foto' => $fotoPath
        ]);

        // Send back to index after saving
        header("Location: index.php");
        exit;
    }
    ?>
</body>
</html>