<?php
session_start(); // Inicia la sesión para poder usar variables de sesión (por ejemplo, para mantener al usuario logueado)
include("conexion.php"); // Incluye el archivo de conexión a la base de datos

// Comprobamos si el formulario fue enviado mediante POST
if ($_SERVER['REQUEST_METHOD'] === "POST") {

	// Verificar si los campos email o pass están vacíos
	if (empty($_POST['email']) || empty($_POST['pass'])) {
		// Si alguno está vacío, se muestra un mensaje de advertencia
		$sms = '<div class="alert alert-warning mt-3" role="alert">
                    ⚠️ Por favor, completa todos los campos.
                </div>';
	} else {
		// Se obtienen los valores ingresados por el usuario y se eliminan espacios extra
		$email = trim($_POST['email']);
		$pass = trim($_POST['pass']);

		// Prevención de inyección SQL (limpia los datos antes de usarlos en la consulta)
		$email = mysqli_real_escape_string($conn, $email);
		$pass = mysqli_real_escape_string($conn, $pass);

		// Consulta SQL para verificar si existe un usuario con ese email y contraseña
		// ⚠️ IMPORTANTE: en un sistema real, no se deben guardar contraseñas en texto plano.
		// Se recomienda usar password_hash() y password_verify()
		$consulta = "SELECT * FROM usuarios WHERE email='$email' AND pass='$pass'";
		$result = mysqli_query($conn, $consulta);

		// Verificar si hubo error en la ejecución de la consulta
		if (!$result) {
			$sms = '<div class="alert alert-danger mt-3" role="alert">
                        ❌ Error en la base de datos: ' . htmlspecialchars(mysqli_error($conn)) . '
                    </div>';
		} elseif (mysqli_num_rows($result) === 1) {
			// Si se encontró exactamente un usuario con esas credenciales
			$row = mysqli_fetch_assoc($result);

			// Guardamos en variables de sesión algunos datos del usuario
			$_SESSION['id_usuario'] = $row["id_usuario"]; // ✅ Guarda el ID del usuario logueado
			$_SESSION['nombre'] = $row["nombre"];
			$_SESSION['rol'] = $row["rol"];


			// Redirigir según el rol del usuario
			if ($row["rol"] == 0) {
				// Usuario normal
				header("Location: UsuarioNormal/indexNormal.php");
			} else if ($row["rol"] == 1) {
				// Usuario administrador
				header("Location: UsuarioAdministrador/IndexAdmin.php");
			} else {
				// Si el rol no es válido, muestra mensaje de error
				$sms = '<div class="alert alert-warning mt-3" role="alert">
                            ⚠️ Rol incorrecto, consulte con el administrador.
                        </div>';
			}

			// Salimos del script para evitar seguir ejecutando código después del header()
			exit;
		} else {
			// Si no se encontró ningún usuario o la contraseña es incorrecta
			$sms = '<div class="alert alert-danger mt-3" role="alert">
                        ❌ Usuario no registrado o contraseña/email incorrectos.
                    </div>';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="./Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap JS -->
	<script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Iconos de Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<!-- Hoja de estilos personalizada -->
	<link href="styles.css" rel="stylesheet">
	<title>POKEDAW - INICIO SESIÓN</title>
</head>

<body>
	<?php include("header.php"); ?> <!-- Incluye encabezado común -->

	<section>
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-9 col-sm-8 col-md-6 col-xl-4 mb-5 mt-3">

					<!-- Título principal -->
					<div class="row justify-content-center titulos mt-5 mb-4">
						<div class="col-12 mt-5">
							<p class="h2 text-center">ACCEDE A TU CUENTA</p>
						</div>

						<!-- Formulario de inicio de sesión -->
						<div class="col-8 mt-4">
							<form action="" method="POST">
								<!-- Campo de correo -->
								<div class="form-floating mb-3">
									<input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" required>
									<label for="email">Correo electrónico</label>
								</div>

								<!-- Campo de contraseña -->
								<div class="form-floating mb-3">
									<input type="password" name="pass" class="form-control" id="pass" placeholder="Contraseña" required>
									<label for="pass">Contraseña</label>
								</div>

								<!-- Botón para enviar el formulario -->
								<div class="col-12 mt-4 d-grid mb-5">
									<button class="btn btn-lg btn-primary" type="submit">INICIAR SESIÓN</button>

									<!-- Mostrar mensajes (alertas de error, éxito, etc.) -->
									<?php if (isset($sms)) echo $sms; ?>
								</div>
							</form>
						</div>
					</div>

					<!-- Sección para registrarse si no tiene cuenta -->
					<div class="row">
						<div class="col-12 mb-1">
							<p class="text-center cuenta">¿NECESITAS UNA CUENTA?</p>
							<a class="btn w-100 btn-secondary" href="registro.php">REGÍSTRATE</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<?php include("footer.php"); ?> <!-- Incluye pie de página común -->
</body>

</html>