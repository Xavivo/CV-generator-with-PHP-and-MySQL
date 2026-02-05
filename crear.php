<?php
include 'resources/db.php';
$d = []; // Array
$idiomasSelect = [];

// If we're editing, we fetch the existing data to pre-fill the form
if (isset($_GET['editar_id'])) {
    $stmt = $pdo->prepare("SELECT * FROM cvs WHERE id = ?");
    $stmt->execute([$_GET['editar_id']]);
    $d = $stmt->fetch(PDO::FETCH_ASSOC);
    if($d) {
        $idiomasSelect = array_map('trim', explode(',', $d['idiomas']));
    }
}
?>
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Ranchers&display=swap" rel="stylesheet">
</head>
<body>
    <div class="headerContainer">
        <h1>Formulario CV</h1>
        <a href="index.php" class="button" id="volverInicio">Volver al inicio</a>
        <img src="resources/header.png" alt="headerPhoto" id="headerPhoto">
    </div>
    <form onsubmit="return validateLanguages()" action="guardar.php" method="POST" enctype="multipart/form-data">
        
        <?php if(!empty($d['id'])): ?>
            <input type="hidden" name="editar_id" value="<?= $d['id'] ?>">
        <?php endif; ?>
        <input type="hidden" name="foto_actual" value="<?= $d['foto'] ?? '' ?>">

        <label for="name">Nombre</label>
        <input type="text" name="nombre" id="name" value="<?= $d['nombre'] ?? '' ?>" required>

        <label for="apellido1">Primer Apellido</label>
        <input type="text" name="apellido1" id="apellido1" value="<?= $d['apellido1'] ?? '' ?>" required>

        <label for="apellido2">Segundo Apellido</label>
        <input type="text" name="apellido2" id="apellido2" value="<?= $d['apellido2'] ?? '' ?>" required>

        <label for="edad">Edad</label>
        <input type="number" name="edad" id="edad" value="<?= $d['edad'] ?? '' ?>" required>

        <label for="ciudad">Ciudad de residencia</label>
        <input type="text" name="ciudad" id="ciudad" value="<?= $d['ciudad'] ?? '' ?>" required>

        <label for="experiencia">Experiencia laboral</label>
        <textarea placeholder="Háblanos un poco de tí..." name="experiencia" id="experiencia" required><?= $d['experiencia'] ?? '' ?></textarea>

        <label for="formacion">Formación académica</label>
        <textarea placeholder="Háblanos sobre tu formación académica..." name="formacion" id="formacion" required><?= $d['formacion'] ?? '' ?></textarea>

        <label for="habilidades">Habilidades</label>
        <textarea placeholder="Háblanos sobre tus habilidades..." name="habilidades" id="habilidades" required><?= $d['habilidades'] ?? '' ?></textarea>

        <label for="idiomas">Idiomas</label>
        <?php 
            $langs = ['inglés', 'español', 'francés', 'alemán', 'italiano', 'portugués', 'chino', 'japonés', 'árabe', 'ruso', 'otro'];
            foreach($langs as $lang): 
                $checked = in_array($lang, $idiomasSelect) ? 'checked' : '';
        ?>
            <input type="checkbox" name="idiomasArray[]" value="<?= $lang ?>" <?= $checked ?>> <?= ucfirst($lang) ?><br>
        <?php endforeach; ?>

        <label for="pfp">Adjunta tu foto de perfil</label>
        <input type="file" name="pfp" id="pfp">
        <?php if(!empty($d['foto'])): ?>
            <p id="actualPhoto">Actual: <a href="<?= $d['foto'] ?>" target="_blank">Ver foto actual</a> (Sube otra para cambiarla)</p>
        <?php endif; ?>

        <button type="submit">Guardar CV</button>
    </form>
    <script>
        function validateLanguages() {
            const checkboxes = document.querySelectorAll('input[name="idiomasArray[]"]:checked');
            if (checkboxes.length === 0) {
                alert('Debes seleccionar al menos un idioma.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>