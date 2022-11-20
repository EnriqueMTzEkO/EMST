<?php
    require 'conexion.php';

    session_start();

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $consulta = "select count(*) as contar
                from usuarios
                where usuario = '$usuario' and clave = '$clave' ";
    $ejecutar = mysqli_query ($conexion, $consulta);
    $resultado = mysqli_fetch_array ($ejecutar);

    if($resultado['contar']>0){
        $_SESSION['username'] = $usuario;
        header("location:../index.php");
    }else{
        echo '<p>Error! Usuario invalido!!</p>';
        echo "<a href='../login.php'>Regresar</a>";
    }
?>