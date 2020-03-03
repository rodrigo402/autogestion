<?php
include_once 'includes/conexion.php';

$idp = $_POST['idp'];

$cliente_id = returnClienteXIdp($idp);

$res_producto = returnProducto_por_id($idp);

$datos_producto = mysqli_fetch_array($res_producto);

$datos_cliente = returnCliente($cliente_id);

header('Content-Type: application/json');

$lista_datos = array();

$cliente = mysqli_fetch_array($datos_cliente);

$lista_datos['confirmacion']        = true;
$lista_datos['nombre']     = $cliente['nombre'];
$lista_datos['apellido']  = $cliente['apellido'];
$lista_datos['telefono'] = $cliente['telefono'];
$lista_datos['direccion'] = $cliente['direccion'];

echo json_encode($lista_datos, JSON_FORCE_OBJECT);
?>