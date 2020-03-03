<?php
include_once 'includes/conexion.php';

$idp = $_POST['idp'];

$provedor_id = returnProveedorXIdp($idp);

$res_producto = returnProducto_por_id($idp);

$datos_producto = mysqli_fetch_array($res_producto);

$tipo_producto = $datos_producto['tipo_producto'];

$datos_provedor = returnProvedor($provedor_id);

header('Content-Type: application/json');

$lista_datos = array();

$provedor = mysqli_fetch_array($datos_provedor);

$lista_datos['confirmacion']        = true;
$lista_datos['nombre_provedor']     = $provedor['nombre'];
$lista_datos['telefono_proveedor']  = $provedor['telefono'];
$lista_datos['direccion_proveedor'] = $provedor['direccion'];
$lista_datos['tipo_producto']       = $tipo_producto;

echo json_encode($lista_datos, JSON_FORCE_OBJECT);
