<?php

$usuario = $_POST['nnombre'];
$pass    = $_POST['npassword'];

if (empty($usuario) || empty($pass)) {
    header("Location: ../index.php");
    exit();
}

$con = mysqli_connect('localhost', 'root', '', 'datos_sistema') or die("Error al conectar " . mysqli_error());

$result = mysqli_query($con, "SELECT * from usuarios where Usuario='" . $usuario . "'");

if ($row = mysqli_fetch_array($result)) {
    if ($row['Password'] == $pass) {

        header("Location: ../principal.php");
    } else {

        header("Location: ../index.php?error=true");
    }
} else {
    header("Location: ../index.php");
    exit();
}

