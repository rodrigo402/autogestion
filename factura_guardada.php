<head>
	<title>FACTURAS</title>
	<link rel="STYLESHEET" type="text/css" href="style/estilo_sistema.css">
	<script src="javascripts/validar.js" type="text/javascript" charset="utf-8"></script>
	
</head>
<?php
include_once 'includes/conexion.php';
eliminarFactura()
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

	<p class="cabezeraM">FACTURAS</p>

<table border="1px" align="center">
	<thead>
		<th>Nº</th>
		<th>NOMBRE CLIENTE</th>
		<th>APELLIDO CLIENTE</th>
		<th>NOMBRE PRODUCTO</th>
		<th>TIPO PRODUCTO</th>
		<th>CANTIDAD PRODUCTO</th>	
		<th>METROS PRODUCTO</th>
		<th>PRECIO PRODUCTO</th>
		<th>TOTAL</th>
		<th>DESCRIPCION</th>
		<th>FECHA</th>
	</thead>
		<?php
		$datos = mostrarFactura();
		while ($facturas = mysqli_fetch_array($datos)) {?>
        <tr>    
            <td><?php echo $facturas['id_factura']; ?></td>
            <td><?php echo $facturas['nombre']; ?></td>
            <td><?php echo $facturas['apellido']; ?></td>
            <td><?php echo $facturas['id_producto']; ?></td>
            <td><?php echo $facturas['tipo_producto']; ?></td>
            <td><?php echo $facturas['cantidad_producto']; ?></td>
            <td><?php echo $facturas['metros_producto']; ?></td>
            <td>$<?php echo $facturas['precio_producto']; ?></td>
            <td>$<?php echo $facturas['total']; ?></td>
            <td><?php echo $facturas['descripcion']; ?></td>
            <td><?php echo $facturas['fecha_factura']; ?></td>
            <td><a href="factura_guardada.php?id=<?php echo $facturas['id_factura']; ?>">ELIMINAR</a></td> 
        </tr>
        
        <?php
		}
	?>
	<?php
		include_once 'includes/conexion.php';
		
	?>
</table>
   

	
	   <BR>
	   <BR>
	   <BR>
	   <BR>
	   <BR>
	   <BR>
	   <BR>
	   <BR>

<div class="pie"> Rodrigo Reynoso  - Alumno del Terciario Gral. J.J. Urquiza-</div>