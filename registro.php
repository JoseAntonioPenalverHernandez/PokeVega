<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass2'])) {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];

        // Validamos que las contraseñas coincidan
        if ($pass !== $pass2) {
            echo "Las contraseñas no coinciden.";
        } else {
            // Insertamos el usuario (id_usuario se genera automáticamente)
            $sql = "INSERT INTO usuarios (id_usuario,nombre, email, pass, rol, fecha_registro) 
                    VALUES (0,'$nombre', '$email', '$pass', 0, NOW())";

            if (mysqli_query($conn, $sql)) {
                header("LOCATION:index.php");
            } else {
               echo "Error al registrar usuario: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Faltan datos obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="styles.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/Pokemon.png">
    <title>REGISTRO - POKEDAW</title>
</head>

<body>
    <div class="container-fluid cabecera">
        <header class="row justify-content-center align-items-center">
            <div class="d-none d-md-block col-4 p-0 izq mt-4"></div>
            <div class="col-12 col-md-4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-auto mt-1">
                        <img class="m-0" src="img\Pokeball.png" style="width:50px">
                    </div>
                    <div class="col-auto">
                        <p class="text-center m-0"><span class="v"> PLAN</span><span class="me">TA</span></p>
                    </div>

                    <div>
                    </div>
                    <div class="col-auto mt-1 ms-4"></div>
                    <div class="w-100"></div>
                </div>
            </div>
            <div class="d-none d-md-block col-4 p-0 der mt-4"></div>
            <div class="col-12 mb-1">
                <p class="h1 text-center">POKEDAW - CREAR USUARIO</p>
            </div>
        </header>
    </div>

    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-11 col-sm-12 col-lg-11 col-xl-10 mb-4 mt-4">
                    <div class="row justify-content-center titulos mt-4 mb-4">
                        <div class="col-12 mt-4">
                            <p class="text-center" style="font-size: 25pt;">NUEVO ENTRENADOR POKEMON</p>
                        </div>
                        <div class="col-10">
                            <hr>
                        </div>
                        <!-- Formulario de registro -->
                        <form action="" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                                <label for="nombre">Nombre</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" required>
                                <label for="email">Correo electrónico</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña" required>
                                <label for="pass">Contraseña</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Confirma tu contraseña" required>
                                <label for="pass2">Confirmar contraseña</label>
                            </div>

                            <div class="d-grid mb-3">
                                <button class="btn btn-lg" type="submit">CREAR CUENTA</button>
                            </div>

                            <div class="text-center">
                                <p class="cuenta">¿Ya tienes una cuenta?</p>
                                <a href="index.php" class="btn w-100">Iniciar sesión</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("footer.php"); ?>
</body>

</html>