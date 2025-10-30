<?php
// 🔹 Iniciar sesión al principio SIEMPRE
session_start();

include("../conexion.php");

$id_usuario = $_SESSION['id_usuario'];

?>

<?php
// Total de cartas del usuario
$sql_total = "SELECT COUNT(*) as total FROM cartas WHERE id_usuario = $id_usuario";
$res_total = mysqli_query($conn, $sql_total);
$total = mysqli_fetch_assoc($res_total)['total'] ?? 0;

// Cartas raras
$sql_raras = "SELECT COUNT(*) as raras FROM cartas WHERE id_usuario = $id_usuario AND rareza='Rara'";
$res_raras = mysqli_query($conn, $sql_raras);
$raras = mysqli_fetch_assoc($res_raras)['raras'] ?? 0;

// Cartas legendarias
$sql_legendarias = "SELECT COUNT(*) as legendarias FROM cartas WHERE id_usuario = $id_usuario AND rareza='Legendaria'";
$res_legendarias = mysqli_query($conn, $sql_legendarias);
$legendarias = mysqli_fetch_assoc($res_legendarias)['legendarias'] ?? 0;
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
	<link rel="icon" type="image/x-icon" href="../img\Pokeball.png">
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
						<img class="m-0" src="../img/Bulbasur.png" style="width:50px">
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


	<!-- 🔹 NAVBAR -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="main_navbar">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-collection-fill"></i> Visualizar Cartas
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="visualizarCarta.php">Visualizar</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-plus-circle"></i> Añadir Cartas
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="insertarCarta.php">Añadir</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-pencil-square"></i> Modificar
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="modificarCarta.php">Modificar cartas</a></li>
						</ul>
					</li>
				</ul>

				<!-- 🔹 Usuario logueado -->
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-person-circle"></i>
							<?php echo htmlspecialchars($_SESSION['nombre']); ?>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="../logout.php">Cerrar sesión</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<section class="container mt-5 mb-5">

		<div class="row text-center mb-4">
			<h2 class="fw-bold text-primary animate__animated animate__fadeInDown">
				Bienvenido, <?php echo $_SESSION['nombre']; ?> 👋
			</h2>
			<p class="text-muted">Aquí puedes gestionar tus cartas, ver tu colección y realizar cambios.</p>
		</div>

		<!-- Tarjetas de opciones -->
		<div class="row justify-content-center g-4">

			<!-- Visualizar cartas -->
			<div class="col-md-4">
				<div class="card shadow h-100 border-primary">
					<div class="card-body text-center">
						<i class="bi bi-collection-fill display-4 text-primary mb-3"></i>
						<h5 class="card-title">Visualizar Cartas</h5>
						<p class="card-text">Consulta todas las cartas que has añadido a tu colección.</p>
					</div>
				</div>
			</div>

			<!-- Añadir nueva carta -->
			<div class="col-md-4">
				<div class="card shadow h-100 border-success">
					<div class="card-body text-center">
						<i class="bi bi-plus-circle-fill display-4 text-success mb-3"></i>
						<h5 class="card-title">Añadir Carta</h5>
						<p class="card-text">Agrega nuevas cartas Pokémon a tu colección personal.</p>
					</div>
				</div>
			</div>

			<!-- Modificar cartas -->
			<div class="col-md-4">
				<div class="card shadow h-100 border-warning">
					<div class="card-body text-center">
						<i class="bi bi-pencil-square display-4 text-warning mb-3"></i>
						<h5 class="card-title">Modificar Cartas</h5>
						<p class="card-text">Edita los datos o elimina cartas existentes de tu colección.</p>
					</div>
				</div>
			</div>

		</div>

		<!-- Sección de estadísticas del usuario -->
		<div class="container mt-5">
			<div class="row text-center">
				<div class="col-md-4 mb-3">
					<div class="p-3 bg-light border rounded">
						<h4 class="text-primary">Total de cartas</h4>
						<p class="display-6 fw-bold"><?php echo $total; ?></p>
					</div>
				</div>

				<div class="col-md-4 mb-3">
					<div class="p-3 bg-light border rounded">
						<h4 class="text-success">Cartas raras</h4>
						<p class="display-6 fw-bold"><?php echo $raras; ?></p>
					</div>
				</div>

				<div class="col-md-4 mb-3">
					<div class="p-3 bg-light border rounded">
						<h4 class="text-danger">Cartas legendarias</h4>
						<p class="display-6 fw-bold"><?php echo $legendarias; ?></p>
					</div>
				</div>
			</div>
		</div>

	</section>

	<script src="./Bootstrap/js/bootnavbar.js"></script>
	<script>
		new bootnavbar();
	</script>



	<footer>
		<div class="container-fluid ">
			<div class="row justify-content-center footer1">
				<div class="row justify-content-center mt-4">
					<div class="col-auto">
						<a href="https://www.google.es/maps/place/CES+Vega+Media/@38.0515582,-1.253702,17z/data=!3m1!4b1!4m5!3m4!1s0xd647ed425284579:0xc1fae33ccb32d958!8m2!3d38.0515582!4d-1.253702" target="_blank">
							<i class="bi bi-geo-alt-fill"></i>&nbsp;&nbsp;CES VEGA MEDIA, S. COOP.
						</a>
					</div>
					<div class="w-100 d-sm-none"></div>
					<div class="col-auto ">
						<i class="bi bi-envelope-fill"></i>&nbsp;&nbsp;vegamedia@ces-vegamedia.es
					</div>
					<div class="w-100 d-sm-none"></div>
					<div class="col-auto">
						<i class="bi bi-telephone-fill"></i>&nbsp;&nbsp;968 620 913<br>
					</div>
				</div>
				<div class="row justify-content-center align-items-center">
					<div class="col-auto">
						<img src="../img\Bulbasur.PNG" width="80px">
					</div>
					<div class="col-auto">
						<span class="ve"> POKE</span><span class="me">VEGA</span>
					</div>
					<div class="col-12 ">
						<p class="text-center"> Ctra. De Mula, 37 – Alguazas
							30560 – Murcia</p>
					</div>
				</div>
				<div class="row justify-content-center mb-2 links">
					<div class=" col-auto">
						<a href="https://ces-vegamedia.es/aviso-legal/" target="_blank"> Aviso legal</a>
					</div>
					<div class="col-auto">
						<a href="https://ces-vegamedia.es/privacidad/" target="_blank">Política de privacidad</a>
					</div>
					<div class="col-auto">
						<a href="https://ces-vegamedia.es/cookies/" target="_blank">Política de cookies</a>
					</div>
					<div class="col-auto">
						<a href="https://ces-vegamedia.es/condiciones-de-compra/" target="_blank">Condiciones generales de contratación</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-center footer2">
					<p class="mb-3 mt-2 small">TRABAJO REALIZADO POR JOSE ANTONIO PEÑALVER HERNANDEZ<br>
						2025 CES VEGA MEDIA | CENTRO DE ENSEÑANZA©</p>
				</div>
			</div>
		</div>
	</footer>


</body>

</html>