<head>
	<title>CLIENTES</title>
	<link rel="STYLESHEET"  href="style/prueba.css">
	<link rel="STYLESHEET"  href="css/bootstrap.min.css">
	<script src="javascripts/validar.js" type="text/javascript" charset="utf-8"></script>
</head>
<?php
include_once 'includes/conexion.php';
if (isset($_POST['nombre'])) 
{
    $nombre    = $_POST['nombre'];
    $apellido  = $_POST['apellido'];
    $telefono  = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $dni       = $_POST['dni'];
    include_once 'includes/conexion.php';
   		 $resultado = agregarCliente($nombre, $apellido, $telefono, $direccion, $dni);
		    if(!$resultado)
		    {
		    	echo"ERROR no se pudo cargar el CLIENTE";
		    } 
}
eliminarCliente()
?>
<div class="titulo"><h1>Clientes</h1></div>
<nav>
	<ul>
		<li><a href="principal.php">INICIO</a>
		 	<li><a href="#">MENÚ</a>
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
			<button class="btn btn-info" onclick="mostrar();">Nuevo Cliente</button>
		</div>
<div id="flotante" style="display:none;">
				
					<div class="separacion">
						<form action="nuevo_cliente.php" method="POST">
							<label>NOMBRE:</label>
							<input type="text" id="nombre" required  name="nombre"   placeholder="NOMBRE" class="form-control">
							<label>APELLIDO:</label>
							<input type="text" id="apellido" required name="apellido" placeholder="APELLIDO" class="form-control">
							<label>TELÉFONO:</label>
							<input type="text" id="telefono" required name="telefono" placeholder="TELEFONO" class="form-control">
							<label>DIRECCIÓN:</label>
							<input type="text" id="direccion" required name="direccion"placeholder="DIRECCION" class="form-control">
							<label>DNI:</label>
							<input type="text" id="dni"required name="dni" placeholder="DNI" class="form-control"><br>
							<center><button  class="btn btn-success" id="btn">Agregar Cliente</button></center>
						</form>
					</div> 
</div>	
<div class="left">
	<?php
	include_once 'includes/buscar.php';
	buscarClientes()
	?>
	<form action="nuevo_cliente.php" method="post">
		<input name="palabra" type="search" autocomplete="off" placeholder="Buscar">
		<button  class="btn btn-info" type="submit" name="buscador" value="Buscar" onclick="cerrar();"> Buscar </button>	
	</form>
</div>

<div class="ibody">
		<table class="table table-condensed">
			<tr class="success">
				<th>LEGAJO</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<th>TELÉFONO</th>
				<th>DIRECCIÓN</th>
				<th>DNI</th>
			</tr>	
		 <?php
			$datos = mostrarClientes();
			 while ($clientes = mysqli_fetch_array($datos)) {?>
				<tr>
				  	<td><?php echo $clientes['id_cliente']; ?></td>
					<td><?php echo $clientes['nombre']; ?></td>
					<td><?php echo $clientes['apellido']; ?></td>
					<td><?php echo $clientes['telefono']; ?></td>
					<td><?php echo $clientes['direccion']; ?></td>
					<td><?php echo $clientes['dni']; ?></td>
					<td><a href="nuevo_cliente.php?id=<?php echo $clientes['id_cliente']; ?>"><button  class="btn btn-danger">ELIMINAR</button></a></td>
					<td><a class="editar" href="editar_cliente.php?id=<?php echo $clientes['id_cliente']; ?>"><button  class="btn btn-primary">EDITAR</button></a></td>
				</tr>
			 <?php }?>
		</table>
	
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

