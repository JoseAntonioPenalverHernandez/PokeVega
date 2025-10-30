<?php
session_start();
include("../conexion.php");

if(!isset($_SESSION['id_usuario'])){
    die("Acceso denegado");
}

$id_usuario = intval($_SESSION['id_usuario']);

// 🔹 Manejo de actualización
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_carta'])){
    $id_carta = intval($_POST['id_carta']);
    $nombre_pokemon = mysqli_real_escape_string($conn, $_POST['nombre_pokemon']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $rareza = mysqli_real_escape_string($conn, $_POST['rareza']);
    $region_origen = mysqli_real_escape_string($conn, $_POST['region_origen']);
    $nivel = intval($_POST['nivel']);
    
    // 🔹 Actualizar la carta
    $sql_update = "UPDATE cartas SET 
        nombre_pokemon='$nombre_pokemon', 
        descripcion='$descripcion', 
        rareza='$rareza', 
        region_origen='$region_origen', 
        nivel=$nivel 
        WHERE id_carta=$id_carta AND id_usuario=$id_usuario";
    
    if(mysqli_query($conn, $sql_update)){
        header("LOCATION:indexNormal.php");
    } else {
        $error = "Error al actualizar: " . mysqli_error($conn);
    }
}

// 🔹 Obtener todas las cartas del usuario
$res_cartas = mysqli_query($conn, "SELECT id_carta, nombre_pokemon FROM cartas WHERE id_usuario=$id_usuario");
if(!$res_cartas){
    die("Error en la consulta: " . mysqli_error($conn));
}
$cartas = mysqli_fetch_all($res_cartas, MYSQLI_ASSOC);

// 🔹 Carta seleccionada
$carta_seleccionada = null;
if(isset($_POST['id_carta_seleccionada'])){
    $id_carta_sel = intval($_POST['id_carta_seleccionada']);
    $res_carta = mysqli_query($conn, "SELECT * FROM cartas WHERE id_carta=$id_carta_sel AND id_usuario=$id_usuario");
    if($res_carta){
        $carta_seleccionada = mysqli_fetch_assoc($res_carta);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<title>Modificar Carta - PokeVega</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Modificar Carta</h1>

    <?php if(isset($mensaje)): ?>
        <div class="alert alert-success"><?= $mensaje ?></div>
    <?php endif; ?>
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <!-- Seleccionar carta -->
    <form method="post" class="mb-4">
        <div class="mb-3">
            <label for="id_carta_seleccionada" class="form-label">Selecciona la carta a modificar:</label>
            <select name="id_carta_seleccionada" id="id_carta_seleccionada" class="form-select" onchange="this.form.submit()">
                <option value="">-- Elegir carta --</option>
                <?php foreach($cartas as $c): ?>
                    <option value="<?= $c['id_carta'] ?>" <?= (isset($carta_seleccionada) && $carta_seleccionada['id_carta']==$c['id_carta']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c['id_carta'] . ' - ' . $c['nombre_pokemon']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </form>

    <?php if($carta_seleccionada): ?>
    <!-- Formulario de modificación -->
    <form method="post">
        <input type="hidden" name="id_carta" value="<?= $carta_seleccionada['id_carta'] ?>">

        <div class="mb-3">
            <label class="form-label">Nombre Pokémon</label>
            <input type="text" name="nombre_pokemon" class="form-control" value="<?= htmlspecialchars($carta_seleccionada['nombre_pokemon']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required><?= htmlspecialchars($carta_seleccionada['descripcion']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Rareza</label>
            <select name="rareza" class="form-select" required>
                <option value="Normal" <?= $carta_seleccionada['rareza']=='Normal'?'selected':'' ?>>Normal</option>
                <option value="Rara" <?= $carta_seleccionada['rareza']=='Rara'?'selected':'' ?>>Rara</option>
                <option value="Ultra Rara" <?= $carta_seleccionada['rareza']=='Ultra Rara'?'selected':'' ?>>Ultra Rara</option>
                <option value="Legendaria" <?= $carta_seleccionada['rareza']=='Legendaria'?'selected':'' ?>>Legendaria</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Región de origen</label>
            <input type="text" name="region_origen" class="form-control" value="<?= htmlspecialchars($carta_seleccionada['region_origen']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nivel</label>
            <input type="number" name="nivel" class="form-control" value="<?= intval($carta_seleccionada['nivel']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de subida</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($carta_seleccionada['fecha_subida']) ?>" disabled>
        </div>

        <button type="submit" name="update_carta" class="btn btn-primary" href="indexNormal.php">Actualizar Carta</button>
    </form>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
