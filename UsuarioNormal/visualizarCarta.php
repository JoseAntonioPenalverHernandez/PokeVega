<?php
session_start();
include("../conexion.php");

// Si no hay sesión, redirige al login
if (!isset($_SESSION['id_usuario'])) {
	header("Location: ../index.php");
	exit;
}

$id_usuario = $_SESSION['id_usuario'];

// Consulta las cartas del usuario actual
$sql = "SELECT * FROM cartas WHERE id_usuario = $id_usuario ORDER BY fecha_subida DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mis Cartas Pokémon</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
	<h2 class="text-center text-primary mb-4">📘 Mis Cartas Pokémon</h2>

	<!-- Botón para volver al portal -->
	<div class="text-end mb-3">
		<a href="indexNormal.php" class="btn btn-secondary">
			<i class="bi bi-arrow-left-circle"></i> Volver
		</a>
	</div>

	<?php if (mysqli_num_rows($result) > 0): ?>
		<div class="row g-4">
			<?php while ($row = mysqli_fetch_assoc($result)): ?>
				<div class="col-md-4">
					<div class="card shadow-sm h-100">
						<!-- Imagen -->
						<?php if (!empty($row['imagen'])): ?>
							<img src="../uploads/<?php echo htmlspecialchars($row['imagen']); ?>" class="card-img-top" alt="Carta Pokémon">
						<?php else: ?>
							<img src="../img/noimage.png" class="card-img-top" alt="Sin imagen">
						<?php endif; ?>

						<!-- Contenido -->
						<div class="card-body">
							<h5 class="card-title text-capitalize"><?php echo htmlspecialchars($row['nombre_pokemon']); ?></h5>
							<p class="card-text"><?php echo nl2br(htmlspecialchars($row['descripcion'])); ?></p>

							<ul class="list-group list-group-flush mb-2">
								<li class="list-group-item"><strong>Rareza:</strong> <?php echo ucfirst($row['rareza']); ?></li>
								<li class="list-group-item"><strong>Región:</strong> <?php echo ucfirst($row['region_origen']); ?></li>
								<li class="list-group-item"><strong>Nivel:</strong> <?php echo $row['nivel']; ?></li>
								<li class="list-group-item"><strong>Fecha subida:</strong> <?php echo $row['fecha_subida']; ?></li>
							</ul>

							<div class="text-center">
								<a href="modificarCarta.php?id=<?php echo $row['id_carta']; ?>" class="btn btn-warning btn-sm">
									<i class="bi bi-pencil-square"></i> Editar
								</a>
								<a href="eliminarCarta.php?id=<?php echo $row['id_carta']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar esta carta?')">
									<i class="bi bi-trash"></i> Eliminar
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

	<?php else: ?>
		<div class="alert alert-info text-center mt-4">
			<i class="bi bi-info-circle"></i> Aún no has añadido ninguna carta.
			<br>
			<a href="insertarCarta.php" class="btn btn-primary mt-3">Añadir Carta</a>
		</div>
	<?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
