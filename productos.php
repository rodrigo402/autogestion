<head>
	<title>PRODUCTOS</title>
	<link rel="STYLESHEET"  href="style/prueba.css">
	<link rel="STYLESHEET"  href="css/bootstrap.min.css">
	<script src="javascripts/validar.js" type="text/javascript" charset="utf-8"></script>
</head>
<?php
include_once 'includes/conexion.php';
if (isset($_POST['nombre'])) {
    $nombre     = $_POST['nombre'];
    $tipo       = $_POST['tipo'];
    $precioneto = $_POST['precioneto'];
    $stock      = $_POST['stock'];
    $provedor   = $_POST['id_provedor'];
    
    $resultado = agregarProducto($nombre, $tipo, $precioneto, $stock, $provedor);
    if ($resultado) {
        
    	echo "<script> alert('Producto Agregado'); </script>";
    }else 
    {
		echo "<script> alert('No se puede agregar Producto'); </script>";
    }
}
include_once 'includes/buscar.php';
buscarproducto();
eliminarProducto()

?>
<div class="titulo"><h1>Productos</h1></div>
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
			<button class="btn btn-info" onclick="mostrar();">Nuevo Producto</button>
		</div>
	<div id="flotante" style="display:none;">
			<div class="separacion">
				<form action="productos.php" method="POST">
					<label>NOMBRE:</label>
					<input type="text" id="nombre" required  name="nombre"   placeholder="NOMBRE DEL PRODUCTO" class="form-control">
					<label>TIPO:</label>
					<input type="text" name="tipo" 	id="tipo_producto" placeholder="TIPO DEL PRODUCTO" class="form-control">
					<label>PRECIO NETO:</label>
					<input type="text" name="stock" placeholder="PRECIO" class="form-control">
					<label>CANTIDAD - STOCK:</label>
					<input type="text" name="precioneto" placeholder="CANTIDAD - STOCK" class="form-control">
					<label>PROVEEDOR:</label>
					<SELECT name="id_provedor"class="selectpicker show-tick"><OPTION>PROVEDOR</OPTION>
									<?php
									include_once 'includes/conexion.php';
									$datos = returnProvedores();
									while ($provedor = mysqli_fetch_array($datos)) {?>
									<OPTION value="<?php echo $provedor['id_provedor']; ?>"><?php echo $provedor['nombre']; ?></OPTION>
				 					<?php echo "....." . $provedor['nombre'];} ?>
					</SELECT>
					<center><br><button  class="btn btn-success" id="btn">Agregar Producto</button></center>
				</form>
			</div>
	</div>
		
</div>
<div class="left">
	<form action="productos.php" method="post">
			<input name="palabra" type="search" autocomplete="off" placeholder="buscar...">
			<button  class="btn btn-info" type="submit" name="buscador" value="Buscar" id="btn"> Buscar </button>
	</form>
</div>
<div class="ibody">
<table class="table table-condensed">
	<tr class="success">
		<th></th>
		<th>nombre del producto</th>
		<th>tipo del producto</th>
		<th>precio neto</th>
		<th>stock - disponible</th>
		<th>Proveedor</th>
	</tr>
<?php
$datos = mostrarProducto();
while ($productos = mysqli_fetch_array($datos)) {?>
		<tr>

		  	<td><?php echo $productos['id_producto']; ?></td>
			<td><?php echo $productos['nombre_producto']; ?></td>
			<td><?php echo $productos['tipo_producto']; ?></td>
			<td>$<?php echo $productos['precioneto']; ?></td>
			<td><?php echo $productos['stock']; ?></td>
			
			
		<?php 
		 $res = returnProvedor2($productos['id_provedor']); 
		?>
			<td><?php echo $res['nombre']; ?></td>
		
			<td><a class="eliminar" href="productos.php?id=<?php echo $productos['id_producto']; ?>"><button  class="btn btn-danger">ELIMINAR</button></a></td>
			<td><a class="editar" href="editar_producto.php?id=<?php echo $productos['id_producto']; ?>"><button  class="btn btn-primary">EDITAR</button></a></td>
		</tr>
	 <?php }?>
</table>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>		


		
