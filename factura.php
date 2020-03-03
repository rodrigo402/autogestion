<head>
	<title>FACTURA</title>
<link rel="STYLESHEET"  href="style/prueba.css">
<link rel="STYLESHEET"  href="css/bootstrap.min.css">
<script src="javascripts/validar.js" type="text/javascript" charset="utf-8"></script>
</head>
<?php
	include_once 'includes/conexion.php';
	
	if (!isset($_GET['accion'])) {
		
		session_start();
		session_destroy();
		session_start();
	}
	
	if (isset($_GET['accion']) && $_GET['accion'] == 'producto') {
		$tipo     = $_POST['tipo'];
		$cantidad = $_POST['cantidad'];
		$MTS      = $_POST['MTS'];
		$precio   = $_POST['precio'];
		$suma 	  = 0;
		$total    = $cantidad * $MTS * $precio;
		$idp      = $_POST['idp'];
		
		
		
		if (!isset($_SESSION)) {
			session_start();
			
		}
		
		$producto = array();
		
		$producto['idp']      = $idp;
		$producto['tipo']     = $tipo;
		$producto['cantidad'] = $cantidad;
		$producto['MTS']      = $MTS;
		$producto['precio']   = $precio;
		$producto['total']    = $total;
			//echo "producto agregado correctamente";
		
		} else if (isset($_GET['accion']) == 'factura') {
			
			$idc        = $_POST['idc'];
			$descripcion = $_POST['descripcion'];
			$resultado = guardarFactura($idc, $descripcion);
			if ($resultado) 
			{	
				unset($_SESSION['factura']);
				echo "<script> alert('Factura Guardada'); </script>";
			}else {
				unset($_SESSION['factura']);
				echo "<script> alert('ERROR Productos Insuficientes'); </script>";
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
		<div class="right">
			<button class="btn btn-info" onclick="mostrar2();">Agregar Producto</button>
		</div>
		<div id="flotante2" style="display:none;">
			<div class="separacion">
				<form action="factura.php?accion=producto" method="POST">
					<h1>PRODUCTOS</h1>
					<label>NOMBRE:</label>
					<SELECT name='idp' class="selectpicker show-tick">
						<OPTION>PRODUCTO</OPTION>
						<?php
							$datos = returnProductos();
							while ($productos = mysqli_fetch_array($datos)) {?>
						<OPTION value='<?php echo $productos['nombre_producto']; ?>'><?php echo $productos['nombre_producto']; } ?></OPTION>
					</SELECT><br>
					<label>TIPO:</label>
					<input required type="text" name="tipo" 	id="tipo_producto" placeholder="TIPO DEL PRODUCTO" class="form-control">
					<label>CANTIDAD:</label>
					<input required type="text"name="cantidad" placeholder="CANTIDAD" class="form-control">
					<label>METROS:</label>
					<input required type="text"name="MTS" placeholder="METROS" class="form-control">
					<label>PRECIO:</label>
					<input required type="text"name="precio" placeholder="PRECIO" class="form-control">
					<center><br><button  class="btn btn-success" id="btn">Agregar Producto</button></center>
				</form>
			</div>
		</div>
		<div class="izquierdo">
			<form action="factura.php?accion=factura" method="POST">
				<h1>CLIENTE</h1>
				<label>NOMBRE:</label>
				<SELECT name="idc" class="selectpicker show-tick"><OPTION>CLIENTES</OPTION>
					<?php
						include_once 'includes/conexion.php';
						$datos = returnClientes();
						while ($cliente = mysqli_fetch_array($datos)) {
						?>
						<OPTION onclick="return mostrarDatos(this.value);" value="<?php echo $cliente['id_cliente']; ?>"><?php echo $cliente['apellido']; ?> <?php echo $cliente['nombre']; ?></OPTION>
					<?php echo "....." . $cliente['apellido'];} ?>
				</SELECT><br>
				<label>APELLIDO:</label>
				<input type="text" id="apellido_cliente" required name="apellido" placeholder="APELLIDO" class="form-control">
				<label>TELEFONO:</label>
				<input type="text" id="telefono_cliente" required name="telefono" placeholder="TELEFONO" class="form-control">
				<label>DIRECCION:</label>
				<input type="text" id="direccion_cliente" required name="direccion"placeholder="DIRECCION" class="form-control">
				<label>DESCRIPCION DEL PRESUPUESTO:</label>
				<input type="text" name="descripcion" placeholder="descripcion"class="form-control"><br>
				<center><button  class="btn btn-success" id="btn">GUARDAR FACTURA</button><button type="button" name="btn" class="btn" onclick="imprimir()">IMPRIMIR</button></center>
			</form>
		</div>
		<script src="includes/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
			function mostrarDatos(id) {
				$.ajax({
					url: 'mostrar-datos-presupuesto.php',
					type: 'POST',
					//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
					data: {idp: id},
					success:function (datos, textStatus, jqXHR) 
					{
						$('#nombre_cliente').val(datos.nombre);
						$('#apellido_cliente').val(datos.apellido);
						$('#telefono_cliente').val(datos.telefono);
						$('#direccion_cliente').val(datos.direccion);
					}
				});
				
			return false; }
		</script>
		<BR>
		<BR>
		<BR>
		<BR>
		<BR>
		<BR>
		<BR>
		<BR>
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<div class="productos">
			<table class="table table-condensed">
				<tr class="success">
					
					<th>NOMBRE</th>
					<th>TIPO</th>
					<th>CANTIDAD</th>
					<th>MTS</th>
					<th>PRECIO</th>
					<th>TOTAL</th>
					
				</tr>
				<?php 
					if (isset($_GET['accion']) && $_GET['accion'] == 'producto') {	
						if (isset($_SESSION)) {
							$_SESSION['factura'][] = $producto;
							
							
							
							for ($i = 0; $i < count($_SESSION['factura']); $i++) {
								echo "<tr>";
								echo "<td>" . $_SESSION['factura'][$i]['idp'] . "</td>";
								echo "<td>" . $_SESSION['factura'][$i]['tipo'] . "</td>";
								echo "<td>" . $_SESSION['factura'][$i]['cantidad'] . "</td>";
								echo "<td>" . $_SESSION['factura'][$i]['MTS'] . "</td>";
								echo "<td>" . $_SESSION['factura'][$i]['precio'] . "</td>";
								echo "<td>" . $_SESSION['factura'][$i]['total'] . "</td>";
								
								echo "</tr>";
							}
							
						}
					}	   
				?>	
			</table>
			<div class="pie"> Rodrigo Reynoso- Alumno del Terciario Gral. J.J. Urquiza-</div>
		</div>
	</body>