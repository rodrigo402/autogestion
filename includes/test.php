<?php
include_once 'conexion.php';

$id_provedor = returnProveedorXIdp(41);

$res = returnProvedor($id_provedor);

$provedor = mysqli_fetch_array($res);

echo $provedor['nombre'];
