<?php
include 'resources/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['editar_id'] ?? null;
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
    }
    
    // Handle photo upload
    $fotoPath = $_POST['foto_actual'] ?? '';
    if (isset($_FILES['pfp']) && $_FILES['pfp']['error'] === 0) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        
        $fileName = uniqid() . "_" . basename($_FILES['pfp']['name']);
        $targetPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['pfp']['tmp_name'], $targetPath)) {
            $fotoPath = $targetPath;
        }
    }

    // Insert or Update
    if ($id) {
        $sql = "UPDATE cvs SET nombre = :nombre, apellido1 = :apellido1, apellido2 = :apellido2, edad = :edad, ciudad = :ciudad, experiencia = :experiencia, formacion = :formacion, habilidades = :habilidades, idiomas = :idiomas, foto = :foto WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
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
    } else {
        $sql = "INSERT INTO cvs (nombre, apellido1, apellido2, edad, ciudad, experiencia, formacion, habilidades, idiomas, foto) VALUES (:nombre, :apellido1, :apellido2, :edad, :ciudad, :experiencia, :formacion, :habilidades, :idiomas, :foto)";
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
    }

    header("Location: index.php");
    exit;
}
?>