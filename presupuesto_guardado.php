
<head>
	<title>PRESUPUESTOS</title>
	<link rel="STYLESHEET"  href="style/prueba.css">
	<link rel="STYLESHEET"  href="css/bootstrap.min.css">
	<script src="javascripts/validar.js" type="text/javascript" charset="utf-8"></script>
	
</head>
<div class="titulo"><h1>Presupuestos</h1></div>
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
<div class="presupuesto">
<table class="table table-condensed">
	<tr class="success">
		<th>Nº</th>
		<th>CLIENTE</th>
		<th></th>
		<th>PRODUCTO</th>
		<th>TIPO</th>
		<th>CANTIDAD</th>	
		<th>METROS</th>
		<th>PRECIO</th>
		<th>TOTAL</th>
		<th>DESCRIPCION</th>
		<th>FECHA</th>
	</tr>
	<?php
include_once 'includes/conexion.php';
eliminarPresupuesto();
?>
		<?php

		$datos = mostrarPresupuesto();
		  while ($facturas = mysqli_fetch_array($datos)) {?>
        <tr>    
            <td><?php echo $facturas['id_presupuesto']; ?></td>
            <td><?php echo $facturas['nombre']; ?></td>
            <td><?php echo $facturas['apellido']; ?></td>
			<td><?php echo $facturas['nombre_producto']; ?></td>
            <td><?php echo $facturas['tipo_producto']; ?></td>
            <td><?php echo $facturas['cantidad_producto']; ?></td>
            <td><?php echo $facturas['metros_producto']; ?></td>
            <td>$<?php echo $facturas['precio_producto']; ?></td>
            <td>$<?php echo $facturas['total']; ?></td>
            <td><?php echo $facturas['descripcion']; ?></td>
            <td><?php echo $facturas['fecha_presupuesto']; ?></td>
			
            <td><a href="editar_presupuesto.php?id=<?php echo $facturas['id_producto_presupuesto']; ?>"><button  class="btn btn-primary">EDITAR</button></a></td>
            <td><a href="presupuesto_guardado.php?id=<?php echo $facturas['id_presupuesto']; ?>"<button class="btn btn-danger">ELIMINAR</button></a></td> 
        </tr>
        
        <?php
		}

	?>

</table>
 </div> 
</body>
	
	   <BR>
	   <BR>
	   <BR>
	   <BR>
	   <BR>
	   <BR>
	   <BR>
	   <BR>

<div class="pie"> Rodrigo Reynoso  - Alumno del Terciario Gral. J.J. Urquiza-</div>
