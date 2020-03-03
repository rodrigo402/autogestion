<head>
	<title>PEDIDOS</title>

</head>
<link rel="STYLESHEET"  href="style/prueba.css">
<link rel="STYLESHEET"  href="css/bootstrap.min.css">
<script src="javascripts/validar.js" type="text/javascript" charset="utf-8"></script>
</head>
<?php
include_once 'includes/conexion.php';
if (isset($_POST['idp'])) {
    $producto     = $_POST['idp'];
	$proveedor = returnProveedorXIdp($producto);
    $tipo       = $_POST['tipo'];
    $telefono_proveedor      = $_POST['telefono_proveedor'];
    $direccion_proveedor   = $_POST['direccion_proveedor'];
    $descipcion   = $_POST['descipcion'];
    $resultado = agregarPedido($producto, $proveedor);
	if ($resultado){
        
    	echo "<script> alert('Pedido Agregado'); </script>";
    }else 
    {
		echo "<script> alert('No se puede agregar Pedido'); </script>";
    }
}

include_once 'includes/buscar.php';
buscarproducto();
eliminarProducto()

?>
<div class="titulo"><h1>Pedido</h1></div>
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
<div class="right">
		<button class="btn btn-info" onclick="mostrar();">Agregar Producto</button>
</div>
<div id="flotante"  style="display:none;">
		<div class="separacion">
			<form action="pedido.php" method="POST">
				<h1>PRODUCTOS</h1>
					<label>NOMBRE:</label>
						<SELECT name='idp' class="selectpicker show-tick">
						<?php
						$datos = returnProductos();
						while ($productos = mysqli_fetch_array($datos)) {
						?>
						<OPTION onclick="return mostrarDatos(this.value);" value="<?php echo $productos['id_producto']; ?>"><?php echo $productos['nombre_producto']; ?></OPTION>
	 						<?php echo "....." . $productos['nombre_producto'];
							} ?>
						</SELECT><br>
					<label>TIPO:</label>
						<input type="text" name="tipo" 	id="tipo_producto" placeholder="TIPO DEL PRODUCTO" class="form-control">
					<label>NOMBRE DEL PROVEEDOR:</label>
						<input type="text" name="nombre_provedor
				" id="nombre_proveedor" class="form-control" placeholder="NOMBRE PROVEEDOR">
					<label>TELEFONO DEL PROVEEDOR:</label>
						<input type="text"name="telefono_proveedor" id="telefono_proveedor" class="form-control" placeholder="TELEFONO PROVEEDOR">
					<label>DIRECCION DEL PROVEEDOR:</label>
						<input type="text" name="direccion_proveedor" id="direccion_proveedor" class="form-control" placeholder="DIRECCION PROVEEDOR">
					<label>DESCRIPCION DEL PEDIDO:</label>
						<input type="text" name="descipcion"id="descipcion_proveedor" class="form-control" placeholder="DESCRIPCION">
			<center><br><button  class="btn btn-success" id="btn">Agregar Producto</button></center>
			</form>
		</div>
</div>
<div class="ibody">
		<table class="table table-condensed">
			<tr class="success">
				<th>LEGAJO</th>
				<th>NOMBRE</th>
				<th>TIPO</th>
				<th>NOMBRE</th>
				<th>TELEFONO</th>
				<th>DIRECCION</th>
				<th>DESCRIPCION</th>
				<th>FECHA</th>
			</tr>	
		 <?php

		 include_once 'includes/conexion.php';
			$datos = mostrarPedido();
			 while ($pedido = mysqli_fetch_array($datos)) {?>
				<tr>
				  	<td><?php echo $pedido['id_pedido']; ?></td>
					<td><?php echo $pedido['nombre_producto']; ?></td>
					<td><?php echo $pedido['tipo_producto']; ?></td>
					<td><?php echo $pedido['nombre']; ?></td>
					<td><?php echo $pedido['telefono']; ?></td>
					<td><?php echo $pedido['direccion']; ?></td>
					<td><?php echo $pedido['descripcion']; ?></td>
					<td><?php echo $pedido['fecha_pedido']; ?></td>

					<td><a href="pedido.php?id=<?php echo $pedido['id_pedido']; ?>"><button  class="btn btn-danger">ELIMINAR</button></a></td>
				</tr>
			 <?php }?>
		</table>
	
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
<script src="includes/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	function mostrarDatos(id) {

    $.ajax({
      url: 'mostrar-datos-productos.php',
      type: 'POST',
      //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {idp: id},

      success:function (datos, textStatus, jqXHR) {
      	$('#nombre_proveedor').val(datos.nombre_provedor);
      	$('#telefono_proveedor').val(datos.telefono_proveedor);
      	$('#direccion_proveedor').val(datos.direccion_proveedor);
      	$('#tipo_producto').val(datos.tipo_producto);
    }
        });

    return false;
  }
</script>