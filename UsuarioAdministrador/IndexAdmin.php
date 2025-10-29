<?php
// 🔹 Iniciar sesión al principio SIEMPRE
session_start();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<link href="../styles.css" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="img/grifo.ico">
	<title>GESTIÓN - POKEVEGA</title>
</head>

<body>
	<!--Cabecera-->
	<div class="container-fluid cabecera">
		<header class="row justify-content-center align-items-center">
			<div class="d-none d-md-block col-4  p-0 izq mt-4"></div>
			<div class="col-12 col-md-4">
				<div class="row justify-content-center align-items-center">
					<div class="col-auto mt-1">
						<img class="m-0" src="img/GRIFO11.png" style="width:50px">
					</div>
					<div class="col-auto">
						<p class="text-center m-0"><span class="v">V</span><span class="me">M</span></p>
					</div>
					<div class="col-auto mt-1 ms-4"></div>
					<div class="w-100"></div>
				</div>
			</div>
			<div class="d-none d-md-block col-4 p-0 der mt-4"></div>
			<div class="col-12 mb-1">
				<p class="h1 text-center">GESTIÓN - POKEVEGA</p>
			</div>
		</header>
	</div>

	<!--Barra de navegación-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="main_navbar">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent"
				aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-file-earmark-post-fill"></i> Material Curricular
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Nuevo</a></li>
							<li><a class="dropdown-item" href="#">Consultar</a></li>
							<li><a class="dropdown-item" href="#">Editorial</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-person-fill-gear"></i> Personal
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Datos</a></li>
							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Asuntos propios</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Solicitar</a></li>
									<li><a class="dropdown-item" href="#">Consultar</a></li>
									<li><a class="dropdown-item" href="#">Asignar</a></li>
								</ul>
							</li>

							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Faltas</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Nueva</a></li>
									<li><a class="dropdown-item" href="#">Consultar</a></li>
								</ul>
							</li>

							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Bajas</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Nueva</a></li>
									<li><a class="dropdown-item" href="#">Consultar</a></li>
								</ul>
							</li>

							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Actividad</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Nueva</a></li>
									<li><a class="dropdown-item" href="#">Consultar</a></li>
								</ul>
							</li>

							<li><a class="dropdown-item" href="#">Participación</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-file-earmark-person"></i> Alumnos
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Plumier</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-files"></i> Documentación
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Crear categoría</a></li>
							<li><a class="dropdown-item" href="#">Subir documentos</a></li>
							<li><a class="dropdown-item" href="#">Consultar doc.</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-building-fill-gear"></i> Organización
						</a>
						<ul class="dropdown-menu">
							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Horarios</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Insertar guardias</a></li>
									<li><a class="dropdown-item" href="#">Horario grupo/aulas</a></li>
									<li><a class="dropdown-item" href="#">Horario Personal</a></li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-tools"></i> Administración
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Gest. Bajas</a></li>
							<li><a class="dropdown-item" href="#">Sugerencias</a></li>
							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Guardias</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Guardias</a></li>
									<li><a class="dropdown-item" href="#">Guardias de recreo</a></li>
								</ul>
							</li>
							<li><a class="dropdown-item" href="#">Tareas Pendientes</a></li>
							<li><a class="dropdown-item" href="#">Compras</a></li>
							<li><a class="dropdown-item" href="#">Caja</a></li>
							<li><a class="dropdown-item" href="#">Cont. Asuntos propios</a></li>
						</ul>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#"><i class="bi bi-list-check"></i> Encuestas</a>
					</li>
				</ul>

				<!-- 🔹 Usuario logueado -->
				<ul class="navbar-nav mx-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-person-fill"></i>
							<?php
							if (isset($_SESSION['nombre'])) {
								echo ($_SESSION['nombre']);
							} else {
								header("LOCATION: index.php");
								exit;
							}
							?>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="../logout.php">Cerrar sesión</a></li>
						</ul>
					</li>
				</ul>

			</div>
		</div>
	</nav>

	<!--Contenido de la página-->
	<section>
		<h1>Usuario administrador</h1>
	</section>

	<script src="./Bootstrap/js/bootnavbar.js"></script>
	<script>
		new bootnavbar();
	</script>

	<?php include("../footer.php"); ?>
</body>

</html>