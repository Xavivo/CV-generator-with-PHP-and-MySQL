<?php
include 'resources/db.php';

// Delete CV if requested
if (isset($_GET['borrar'])) {
    $stmt = $pdo->prepare("DELETE FROM cvs WHERE id = ?");
    $stmt->execute([$_GET['borrar']]);
    header("Location: index.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM cvs ORDER BY fecha_creacion DESC");
$cvs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de CVs</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="headerContainer">
        <h1>Historial de Versiones</h1>
    </div>
    
    <div id="indexContainer">
        <a href="crear.php" class="button">Crear Nuevo CV</a>
        
        <table id="cvsTable">
            <thead>
                <tr id="trTable">
                    <th>Nombre Completo</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cvs as $cv): ?>
                <tr>
                    <td><?= htmlspecialchars($cv['nombre'] . ' ' . $cv['apellido1']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($cv['fecha_creacion'])) ?></td>
                    <td>
                        <a href="ver.php?id=<?= $cv['id'] ?>" class="buttonSmall">Ver</a>
                        <a href="crear.php?editar_id=<?= $cv['id'] ?>" class="buttonSmall">Editar/Versionar</a>
                        <a href="index.php?borrar=<?= $cv['id'] ?>" class="buttonSmall buttonDelete" onclick="return confirm('¿Borrar?')">X</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>