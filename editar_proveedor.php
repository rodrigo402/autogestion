<head>
	<title>EDITAR-PROVEEDOR</title>
	<link rel="STYLESHEET"  href="style/prueba.css">
	<link rel="STYLESHEET"  href="css/bootstrap.min.css">
	<script src="javascripts/validar.js" type="text/javascript" charset="utf-8"></script>
</head>
<?php
 include_once 'includes/conexion.php';
if (isset($_POST['nombre']))
{
	$idp = $_POST['idp'];
    $nombre    = $_POST['nombre'];
    $telefono  = $_POST['telefono'];
    $direccion = $_POST['direccion'];
   
   	$resultado = editarProveedor($idp, $nombre, $telefono, $direccion);
    
    if ($resultado) {
        
    	echo "<script> alert('Proveedor Actualizado'); </script>";
    }else 
    {
		echo "<script> alert('No se puede Actualizar el Proveedor'); </script>";
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
						<li class="titulo"><a href="">COMERCIAL</a></li>	
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
<form action="editar_proveedor.php?id=<?php echo $_GET['id']; ?>" method="POST">
				<?php
				$datos = mostrarProveedorXid($_GET['id']);
				while ($provedor = mysqli_fetch_array($datos)) {?>
			<tr>
				<label>LEGAJO:</label>
						<input value="<?php echo $provedor['id_provedor']; ?>" type="text"  name="idp"   placeholder="NOMBRE DEL PRODUCTO" class="form-control">
				<label>NOMBRE:</label>
						<input value="<?php echo $provedor['nombre']; ?>" type="text"  name="nombre"   placeholder="NOMBRE DEL PROVEEDOR" class="form-control">
				<label>TELEFONO:</label>
						<input value="<?php echo $provedor['telefono']; ?>" type="text"  name="telefono"   placeholder="TELEFONO DEL PROVEEDOR" class="form-control">
				<label>DIRECCION:</label>
						<input value="<?php echo $provedor['direccion']; ?>" type="text"  name="direccion"   placeholder="TELEFONO DEL PROVEEDOR" class="form-control">
				<center><br><button  class="btn btn-success" id="btn">Actualizar Proveedor</button></center>
		</form>
		</div>
</div>	
		<a href="proveedores.php"><button class="btn btn-info" id="btn">VOLVER</button></a>
	
	 <?php }?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>	