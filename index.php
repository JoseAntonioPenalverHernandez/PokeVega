<?php
// Inicia una nueva sesión o reanuda una existente
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Configuración básica del documento HTML -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Importa Bootstrap CSS -->
	<link href="./Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Importa Bootstrap JS (con soporte para componentes interactivos) -->
	<script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Iconos de Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<!-- Hoja de estilos personalizada -->
	<link href="styles.css" rel="stylesheet">
	<!-- Icono de la pestaña (favicon) -->
	<link rel="icon" type="image/x-icon" href="PokeVega/img/Pokemon.png">

	<!-- Título de la página -->
	<title>POKEDAW - INICIO SESION</title>
</head>

<body>

	<!-- ======= CABECERA Y LÓGICA DE LOGIN ======= -->
	<?php
	// Incluye la cabecera visual del sitio
	include("header.php");
	?>

	<!-- ======= CONTENIDO PRINCIPAL ======= -->
	<section>
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-9 col-sm-8 col-md-6 col-xl-4 mb-5 mt-3">
					<!-- Caja principal del formulario de inicio de sesión -->
					<div class="row justify-content-center titulos mt-5 mb-4">
						<div class="col-12 mt-5">
							<p class="h2 text-center">ACCEDE A TU CUENTA</p>
						</div>

						<!-- Formulario de inicio de sesión -->
						<div class="col-8 mt-4">
							<div class="row">
								<form action="" method="POST">
									<!-- Email -->
									<div class="form-floating mb-3">
										<input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" required>
										<label for="email">Correo electrónico</label>
									</div>

									<!-- Contraseña -->
									<div class="form-floating mb-3">
										<input type="password" name="pass" class="form-control" id="pass" placeholder="Contraseña" required>
										<label for="pass">Contraseña</label>
									</div>
									<!-- Botón de envío -->
									<div class="col-12 mt-4 d-grid mb-5">
										<button class="btn btn-lg" type="submit">INICIAR SESIÓN</button>

										<!-- Muestra mensajes de error o aviso -->
										<?php
										if (isset($sms)) {
											echo "$sms";
										}
										?>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Enlace para registro -->
					<div class="row">
						<div class="col-12 mb-1">
							<p class="text-center cuenta">¿NECESITAS UNA CUENTA?</p>
							<a class="btn w-100" href="registro.php" role="button">REGÍSTRATE</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ======= PIE DE PÁGINA ======= -->
	<?php
	include("footer.php");
	?>

</body>

</html>