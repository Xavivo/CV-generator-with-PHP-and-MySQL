<?php
include 'resources/db.php';
$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM cvs WHERE id = ?");
$stmt->execute([$id]);
$cv = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$cv) die("CV no encontrado");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CV - <?= htmlspecialchars($cv['nombre']) ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body class="cvViewer">
    
    <div class="noPrint" id="noPrintID">
        <button onclick="window.print()" id="pdfPrint">Imprimir / PDF</button>
        <a href="index.php" id="volverHistorial">Volver al historial</a>
    </div>

    <div class="page">
        <div class="sidebar">
            <?php if($cv['foto']): ?>
                <img src="<?= $cv['foto'] ?>" alt="Foto Perfil" class="profileImg">
            <?php else: ?>
                <div class="profilePlaceholder">Sin Foto</div>
            <?php endif; ?>

            <div class="contactInfo">
                <h3>Datos Personales</h3>
                <p><strong>Edad:</strong> <?= $cv['edad'] ?> años</p>
                <p><strong>Ciudad:</strong> <?= htmlspecialchars($cv['ciudad']) ?></p>
                
                <h3>Idiomas</h3>
                <p><?= htmlspecialchars($cv['idiomas']) ?></p>

                <h3>Habilidades</h3>
                <p><?= nl2br(htmlspecialchars($cv['habilidades'])) ?></p>
            </div>
        </div>

        <div class="mainContent">
            <header>
                <h1><?= htmlspecialchars($cv['nombre']) ?></h1>
                <h2><?= htmlspecialchars($cv['apellido1'] . ' ' . $cv['apellido2']) ?></h2>
            </header>

            <section>
                <h3 class="sectionTitle">Experiencia Laboral</h3>
                <div class="contentBlock">
                    <?= nl2br(htmlspecialchars($cv['experiencia'])) ?>
                </div>
            </section>

            <section>
                <h3 class="sectionTitle">Formación Académica</h3>
                <div class="contentBlock">
                    <?= nl2br(htmlspecialchars($cv['formacion'])) ?>
                </div>
            </section>
        </div>
    </div>
</body>
</html>