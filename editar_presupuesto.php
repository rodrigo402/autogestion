<head>
	<title>EDITAR-PRESUPUESTO</title>
	<link rel="STYLESHEET"  href="style/prueba.css">
	<link rel="STYLESHEET"  href="css/bootstrap.min.css">
	<script src="javascripts/validar.js" type="text/javascript" charset="utf-8"></script>
</head>
<?php
 include_once 'includes/conexion.php';
if (isset($_POST['cantidad'])) {
	$idpp = $_POST['idpp'];
	$cantidad = $_POST['cantidad'];
	$MTS      = $_POST['MTS'];
	$precio   = $_POST['precio'];
    $resultado = editarProductoPresupuesto($idpp, $cantidad, $MTS, $precio);
    if ($resultado) {
        
    	echo "<script> alert('Presupuesto Actualizado'); </script>";
    }else 
    {
		echo "<script> alert('No se puede Actualizar el Presupuesto'); </script>";
    }
} 
?>

<nav>
	<ul>
		<li><a href="principal.php">INICIO</a>
		 	<li><a href="#">menu</a>
			<div>
					<ul>
						<li class="titulo"><a href="">ADMINISTRACION</a></li>
						<li><a href="nuevo_cliente.php" class="enlacenav"><img src="style/clientes.jpg"/>clientes</a></li>
						<li><a href="productos.php" class="enlacenav" target="_blank"><img src="style/productos.jpg"/>Productos</a></li>
						<li><a href="proveedores.php" class="enlacenav"><img src="style/proveedores.jpg"/>proveedores</a></li>
						<li><a href="usuarios.php" class="enlacenav"><img src="style/usuarios.jpg"/>usuarios</a></li>
					</ul>
					<ul>	
						<li><a href="presupuesto.php" class="enlacenav"><img src="style/presupuestos.jpg"/>Presupuesto</a></li>
						<li><a href="factura.php" class="enlacenav"><img src="style/facturas.jpg"/>Factura</a></li>
						<li><a href="presupuesto_guardado.php" class="enlacenav"><img src="style/presupuestos_guardado.jpg"/>Presupuestos</a></li>
						<li><a href="factura_guardada.php" class="enlacenav"><img src="style/ventas.jpg"/>Ventas</a></li>
						<li><a href="pedido.php" class="enlacenav"><img src="style/pedidos.jpg"/>Pedidos</a></li>
					</ul>
			</div>
		</li>
	</ul>		
</nav>
<body>
<div class="editar">	
	<div class="editar"><h1>Editar</h1></div>
		<div class="separacion">
<form action="editar_presupuesto.php?id=<?php echo $_GET['id']; ?>" method="POST">

	
 		<?php
		$datos = returnPresupuesto($_GET['id']);
		while ($facturas = mysqli_fetch_array($datos)) 
		{?>
	<tr>
				<label>LEGAJO:</label>
					<input value="<?php echo $facturas['id_producto_presupuesto']; ?>" type="text"  name="idpp" class="form-control">
				<label>CANTIDAD:</label>
					<input value="<?php echo $facturas['cantidad_producto']; ?>" type="text"  name="cantidad" class="form-control">
				<label>METROS:</label>
					<input value="<?php echo $facturas['metros_producto']; ?>" type="text"  name="MTS" class="form-control">
				<label>PRECIO:</label>
					<input value="<?php echo $facturas['precio_producto']; ?>" type="text"  name="precio" class="form-control">
					<center><br><button  class="btn btn-success" id="btn">Actualizar Presupuesto</button></center>
				</form>
			</div>
</div>
		<a href="presupuesto_guardado.php"><button class="btn btn-info" id="btn">VOLVER</button></a>
	 <?php }?>
</form>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>	