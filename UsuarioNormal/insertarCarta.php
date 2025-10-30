<?php
session_start();

include("../conexion.php");

// Si no hay sesión, redirige al login
if (!isset($_SESSION['id_usuario'])) {
	header("Location: ../index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Añadir Carta Pokémon</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 mb-5">
	<div class="card shadow-lg">
		<div class="card-header bg-primary text-white text-center">
			<h3><i class="bi bi-plus-circle"></i> Añadir Carta Pokémon</h3>
		</div>
		<div class="card-body">

			<form action="procesarInsercion.php" method="POST" enctype="multipart/form-data">

				<!-- Mostrar el usuario logueado -->
				<div class="alert alert-info">
					👤 Estás logueado como: 
					<strong>
						<?php echo htmlspecialchars($_SESSION['nombre']); ?>
					</strong>
					(ID usuario: <?php echo $_SESSION['id_usuario']; ?>)
				</div>

				<!-- Nombre del Pokémon -->
				<div class="mb-3">
					<label for="nombre_pokemon" class="form-label">Nombre del Pokémon</label>
					<input type="text" class="form-control" id="nombre_pokemon" name="nombre_pokemon" placeholder="Ejemplo: Pikachu" required>
				</div>

				<!-- Descripción -->
				<div class="mb-3">
					<label for="descripcion" class="form-label">Descripción</label>
					<textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Describe las habilidades o detalles de la carta..." required></textarea>
				</div>

				<!-- Rareza -->
				<div class="mb-3">
					<label for="rareza" class="form-label">Rareza</label>
					<select class="form-select" id="rareza" name="rareza" required>
						<option value="">Selecciona una opción...</option>
						<option value="comun">Común</option>
						<option value="rara">Rara</option>
						<option value="ultra_rara">Ultra Rara</option>
						<option value="legendaria">Legendaria</option>
					</select>
				</div>

				<!-- Región de origen -->
				<div class="mb-3">
					<label for="region_origen" class="form-label">Región de Origen</label>
					<select class="form-select" id="region_origen" name="region_origen" required>
						<option value="">Selecciona una región...</option>
						<option value="Kanto">Kanto</option>
						<option value="Johto">Johto</option>
						<option value="Hoenn">Hoenn</option>
						<option value="Sinnoh">Sinnoh</option>
						<option value="Unova">Unova</option>
						<option value="Kalos">Kalos</option>
						<option value="Alola">Alola</option>
						<option value="Galar">Galar</option>
						<option value="Paldea">Paldea</option>
					</select>
				</div>

				<!-- Nivel -->
				<div class="mb-3">
					<label for="nivel" class="form-label">Nivel</label>
					<input type="number" class="form-control" id="nivel" name="nivel" min="1" max="100" placeholder="Ejemplo: 35" required>
				</div>

				<!-- Imagen -->
				<div class="mb-3">
					<label for="imagen" class="form-label">Imagen del Pokémon</label>
					<input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
				</div>

				<!-- Campo oculto para ID del usuario -->
				<input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">

				<!-- Botones -->
				<div class="d-flex justify-content-between mt-4">
					<a href="indexNormal.php" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Volver</a>
					<button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Guardar Carta</button>
				</div>

			</form>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.js"></script>
</body>
</html>
