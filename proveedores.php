<head>
	<title>PROVEEDORES</title>
	<link rel="STYLESHEET"  href="style/prueba.css">
	<link rel="STYLESHEET"  href="css/bootstrap.min.css">
	<script src="javascripts/validar.js" type="text/javascript" charset="utf-8"></script>
</head>
<?php
include_once 'includes/conexion.php';
if (isset($_POST['nombre']))
{
    $nombre    = $_POST['nombre'];
    $telefono  = $_POST['telefono'];
    $direccion = $_POST['direccion'];
 	include_once 'includes/conexion.php';
   		 $resultado = agregarProveedor($nombre, $telefono, $direccion);
		     if ($resultado) {
        
    	echo "<script> alert('Proveedor Agregado'); </script>";
    }else 
    {
		echo "<script> alert('No se puede agregar Proveedor'); </script>";
    }
}
eliminiarProveedor() 
?>
<div class="titulo"><h1>Proveedores</h1></div>
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
		<div class="right">
			<button class="btn btn-info" onclick="mostrar();">Nuevo Proveedor</button>
		</div>
<div id="flotante" style="display:none;">
		<div class="separacion">
			<form action="proveedores.php" method="POST">
				<label>NOMBRE:</label>
				<input type="text" id="nombre" required  name="nombre"   placeholder="NOMBRE PROVEEDOR" class="form-control">
				<label>TELEFONO:</label>
				<input type="text" id="apellido" required name="telefono" placeholder="TELEFONO DEL PROVEEDOR" class="form-control">
				<label>DIRECCION:</label>
				<input type="text" id="telefono" required name="direccion" placeholder="DIRECCION DEL PROVEEDOR" class="form-control"><br>
				<center><button  class="btn btn-success" id="btn">Agregar Proveedor</button></center>
			</form>
		</div>
</div>
<div class="left">
<?php
include_once 'includes/buscar.php';
buscarProveedor()
?>
<form action="proveedores.php" method="post">
	<input name="palabra" autocomplete="off" placeholder="buscar...">
	<button  class="btn btn-info" type="submit" name="buscador" value="Buscar" onclick="cerrar();"> Buscar </button>	
</form>
</div>
<div class="ibody">
<table class="table table-condensed">
	<tr class="success">
		<th>Legajo</th>
		<th>nombre del fabricante</th>
		<th>telefono</th>
		<th>direccion</th>
	</tr>
	 <?php
	 $datos = mostrarProveedor();
	  while ($proveedores = mysqli_fetch_array($datos)) {?>
		<tr>
			<td><?php echo $proveedores['id_provedor']; ?></td>
		  	<td><?php echo $proveedores['nombre']; ?></td>
			<td><?php echo $proveedores['telefono']; ?></td>
			<td><?php echo $proveedores['direccion']; ?></td>
			<td><a href="proveedores.php?id=<?php echo $proveedores['id_provedor']; ?>"><button  class="btn btn-danger">ELIMINAR</button></a></td>
			<td><a class="editar" href="editar_proveedor.php?id=<?php echo $proveedores['id_provedor']; ?>"><button  class="btn btn-primary">EDITAR</button></a></td>
		</tr>
	 	<?php }?>
</table>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
