<head>
	<title>EDITAR-CLIENTE</title>
	<link rel="STYLESHEET"  href="style/prueba.css">
	<link rel="STYLESHEET"  href="css/bootstrap.min.css">
	<script src="javascripts/validar.js" type="text/javascript" charset="utf-8"></script>
</head>
<?php
 include_once 'includes/conexion.php';
if (isset($_POST['nombre'])) {
	$idc = $_POST['idc'];
	$nombre    = $_POST['nombre'];
    $apellido  = $_POST['apellido'];
    $telefono  = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $dni       = $_POST['dni'];
    $resultado = editarCliente($idc, $nombre, $apellido, $telefono, $direccion, $dni);
    if ($resultado) {
        
    	echo "<script> alert('Cliente Actualizado'); </script>";
    }else 
    {
		echo "<script> alert('No se puede Actualizar el Cliente'); </script>";
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
<form action="editar_cliente.php?id=<?php echo $_GET['id']; ?>" method="POST">

	
 		<?php
		$datos = returnCliente($_GET['id']);
		while ($clientes = mysqli_fetch_array($datos)) 
		{?>
	<tr>
				<label>LEGAJO:</label>
					<input value="<?php echo $clientes['id_cliente']; ?>" type="text"  name="idc" class="form-control">
				<label>NOMBRE:</label>
					<input value="<?php echo $clientes['nombre']; ?>" type="text"  name="nombre" class="form-control">
				<label>APELLIDO:</label>
					<input value="<?php echo $clientes['apellido']; ?>" type="text"  name="apellido" class="form-control">
				<label>TELEFONO:</label>
					<input value="<?php echo $clientes['telefono']; ?>" type="text"  name="telefono" class="form-control">
				<label>DIRECCION:</label>
					<input value="<?php echo $clientes['direccion']; ?>" type="text"  name="direccion" class="form-control">
				<label>DNI:</label>
					<input value="<?php echo $clientes['dni']; ?>" type="text"  name="dni" class="form-control">
					<center><br><button  class="btn btn-success" id="btn">Actualizar Cliente</button></center>
				</form>
			</div>
</div>
		<a href="nuevo_cliente.php"><button class="btn btn-info" id="btn">VOLVER</button></a>
	 <?php }?>
</form>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>	





