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
        <h2>LOGIN</h2>
    </header>
    <main>
        <div class="row">
            <div class="offset-md-4 col-md-4 offset-md-4">
                <div class="p-3 bg-dark text-light text-center">
                    <form action="controlador/ingresar.php" method="POST">
                        <label class="form-label" for="">Usuario:</label>
                        <input type="text" name="usuario" class="form-control">
                        <label class="form-label" for="">Password:</label>
                        <input type="password" name="clave" class="form-control">
                        <div class="mt-3">
                            <button type="submit" class="btn btn-info">Entrar</button>
                            <button type="reset" class="btn btn-danger">Borrar</button>
                            <li class="has-children"><a href="register.php">Clic para Registrar</a></li>
                            <li><a href="index.php">Entra como Invitado</a></li>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>