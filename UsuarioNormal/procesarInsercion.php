<?php
session_start();
include("../conexion.php");

// Verificamos que el usuario esté logueado
if (!isset($_SESSION['id_usuario'])) {
	header("Location: ../index.php");
	exit;
}

// Verificamos que el formulario se haya enviado por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$id_usuario = $_SESSION['id_usuario'];
	$nombre = $_POST['nombre_pokemon'];
	$descripcion = $_POST['descripcion'];
	$rareza = $_POST['rareza'];
	$region = $_POST['region_origen'];
	$nivel = $_POST['nivel'];

	// Manejo de imagen
	$nombreImagen = $_FILES['imagen']['name'];
	$tmp = $_FILES['imagen']['tmp_name'];
	$rutaDestino = "../uploads/" . basename($nombreImagen);

	// Creamos la carpeta uploads si no existe
	if (!is_dir("../uploads")) {
		mkdir("../uploads", 0777, true);
	}

	// Subimos la imagen al servidor
	if (move_uploaded_file($tmp, $rutaDestino)) {

		// Insertamos la carta en la base de datos
		$sql = "INSERT INTO cartas 
			(id_usuario, nombre_pokemon, descripcion, rareza, region_origen, nivel, imagen, fecha_subida)
			VALUES (
				'$id_usuario',
				'$nombre',
				'$descripcion',
				'$rareza',
				'$region',
				'$nivel',
				'$nombreImagen',
				NOW()
			)";

		if (mysqli_query($conn, $sql)) {
			header("Location: indexNormal.php?insert=ok");
			exit;
		} else {
			echo "<div class='alert alert-danger mt-3'>❌ Error al insertar: " . mysqli_error($conn) . "</div>";
		}
	} else {
		echo "<div class='alert alert-warning mt-3'>⚠️ Error al subir la imagen.</div>";
	}
}
?>
