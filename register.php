<?php 
require 'controlador/conexionreg.php';

if (isset($_POST['register'])) {
    if (strlen($_POST['usuario']) >= 1 && strlen($_POST['clave']) >= 1 && strlen($_POST['correo']) >= 1) {
	    $usuario = trim($_POST['usuario']);
        $clave = trim($_POST['clave']);
	    $correo = trim($_POST['correo']);
	    $consulta = "INSERT INTO usuarios (usuario, clave, correo) VALUES ('$usuario','$clave','$correo')";
	    $resultado = mysqli_query($conexion,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has inscripto correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <header>
        <h2>REGISTRO</h2>
    </header>
    <main>
        <div class="row">
            <div class="offset-md-4 col-md-4 offset-md-4">
                <div class="p-3 bg-dark text-light text-center">
                    <form method="POST">
                        <label class="form-label" for="">Usuario:</label>
                        <input type="text" name="usuario" class="form-control">
                        <label class="form-label" for="">Password:</label>
                        <input type="password" name="clave" class="form-control">
                        <label class="form-label" for="">Correo:</label>
                        <input type="email" name="correo" class="form-control">
                        <div class="mt-3">
                            <button type="submit" name="register" class="btn btn-info">Registrar</button>
                        </div>
                        <a href="login.php">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
