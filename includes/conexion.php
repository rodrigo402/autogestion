<?php
$conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
function mostrarClientes()
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $datos    = $conexion->query('SELECT * FROM clientes');
    return $datos;
}
function agregarCliente($nombre, $apellido, $telefono, $direccion, $dni)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $sql      = "INSERT INTO clientes (nombre, apellido, telefono, direccion, dni) VALUES ('$nombre', '$apellido', '$telefono', '$direccion', '$dni')";
    $datos    = $conexion->query($sql);
    if ($datos) {
        return true;
    } else {
        return false;
    }
}
function eliminarFactura()
{
    if (isset($_GET['id']))
    	//echo $_GET['id'];
    {
        $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
        $datos    = $conexion->query('DELETE FROM factura WHERE id_factura = ' . $_GET['id']);
    }
}
function eliminarCliente()
{
    if (isset($_GET['id'])) {
        $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
        $datos    = $conexion->query('DELETE FROM clientes WHERE id_cliente = ' . $_GET['id']);
    }
}
function eliminarPresupuesto()
{
    if (isset($_GET['id'])) {
        $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
        $datos    = $conexion->query('DELETE FROM presupuesto WHERE id_presupuesto = ' . $_GET['id']);
    }

}
function agregarProducto($nombre, $tipo, $precioneto, $stock, $provedor)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $sql      = "INSERT INTO productos (nombre_producto, tipo_producto, stock, precioneto, id_provedor) VALUES ('$nombre', '$tipo', '$precioneto', '$stock', '$provedor')";
    $datos    = $conexion->query($sql);
    if ($datos) {
        return true;
    } else {
        return false;
    }
}
function editarProductoPresupuesto($idpp, $cantidad, $MTS, $precio)
{

    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $sql      = "UPDATE producto_presupuesto
                    SET
                                    cantidad_producto = '$cantidad',
                                    metros_producto  = '$MTS',
                                    precio_producto           = '$precio'        
                                    WHERE
                                    id_producto_presupuesto = '$idpp'";
    $datos = $conexion->query($sql);
    if ($datos) {
        
        return true;

    } else {
        return false;
    }
}
function editarCliente($idc, $nombre, $apellido, $telefono, $direccion, $dni)
{

    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $sql      = "UPDATE clientes
                    SET
                                    nombre = '$nombre',
                                    apellido  = '$apellido',
                                    telefono           = '$telefono',
                                    direccion      = '$direccion',
                                    dni     = '$dni'
                                    WHERE
                                    id_cliente = '$idc'";
    $datos = $conexion->query($sql);
    if ($datos) {
        
        return true;

    } else {
        return false;
    }
}
function editarProveedor($idp, $nombre, $telefono, $direccion)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $sql      = "UPDATE provedores
                    SET
                                    nombre    = '$nombre',
                                    telefono  = '$telefono',
                                    direccion = '$direccion'
                                    WHERE
                                    id_provedor = '$idp'";
    $datos = $conexion->query($sql);
    if ($datos) {   
        return true;
    } else {
        return false;
    }
}
function editarPresupuesto($idp, $cantidad, $MTS, $precio)
{

    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $sql      = ("UPDATE presupuesto
                    SET
                                    cantidad           ='" . $cantidad . "',
                                    MTS      ='" . $MTS . "',
                                    precio     ='" . $precio . "'
                                    WHERE
                                    id_producto ='" . $idp . "'
                                    ");
    $datos = $conexion->query($sql);
    if ($datos) {
        
        return true;

    } else {
        return false;
    }
}
function editarProducto($idp, $precioneto, $stock)
{

    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $sql      = ("UPDATE productos
                    SET
                                    precioneto      ='" . $precioneto . "',
									stock      ='" . $stock . "'
                           
                                    WHERE
                                    id_producto ='" . $idp . "'
                                    ");
    $datos = $conexion->query($sql);
    if ($datos) {
        
        return true;

    } else {
        return false;
    }
}
function mostrarProducto()
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $datos    = $conexion->query('SELECT * FROM productos');
    return $datos;
}
function mostrarProveedorXid($idp)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $datos    = $conexion->query("SELECT * FROM provedores WHERE id_provedor = '$idp'");
    return $datos;
}
function mostrarProductoXid($idp)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $datos    = $conexion->query("SELECT * FROM productos WHERE id_producto = '$idp'");
    return $datos;
}

function eliminarProducto()
{
    if (isset($_GET['id'])) {
        $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
        $datos    = $conexion->query('DELETE FROM productos WHERE id_producto = ' . $_GET['id']);
    }
}
function agregarProveedor($nombre, $telefono, $direccion)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $sql      = "INSERT INTO provedores (nombre, telefono, direccion) VALUES ('$nombre', '$telefono', '$direccion')";
    $datos    = $conexion->query($sql);
    if ($datos) {
        return true;
    } else {
        return false;
    }
}
function mostrarProveedor()
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $datos    = $conexion->query('SELECT * FROM provedores');
    return $datos;
}
function eliminiarProveedor()
{
    if (isset($_GET['id'])) {
        $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
        $datos    = $conexion->query('DELETE FROM provedores WHERE id_provedor = ' . $_GET['id']);
    }
}
function agregarUsuario($usuario, $password)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $sql      = "INSERT INTO usuarios (Usuario, Password) VALUES ('$usuario', '$password')";
    $datos    = $conexion->query($sql);
    if ($datos) {
        return true;
    } else {
        return false;
    }
}
function mostrarUsuario()
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $datos    = $conexion->query('SELECT * FROM usuarios');
   
    return $datos;
}
function eliminiarUsuario()
{
    if (isset($_GET['id'])) {
        $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
        $datos    = $conexion->query('DELETE FROM usuarios WHERE id_usuario = ' . $_GET['id']);
    }
}
function mostrarPresupuesto()
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $datos    = mysqli_query($conexion, "SELECT * FROM presupuesto AS p
	INNER JOIN clientes AS c ON p.id_cliente = c.id_cliente
	INNER JOIN producto_presupuesto AS pp ON pp.id_presupuesto = p.id_presupuesto
	INNER JOIN productos AS pr ON pr.id_producto = pp.id_producto");
return $datos;
}
/*function mostrarFactura()
{

    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    $datos    = $conexion->query('SELECT * FROM factura factu
        JOIN clientes client ON factu.id_cliente = client.id_cliente
        JOIN producto_factura producf ON factu.id_producto = producf.id_producto');

    return $datos;
}*/
function mostrarPedido()
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    $datos    = mysqli_query($conexion, "SELECT * FROM pedido_producto pedid
        JOIN productos produc ON pedid.id_producto = produc.id_producto
        JOIN provedores prov ON pedid.id_provedor = prov.id_provedor");
		return $datos;
	while ($facturas = mysqli_fetch_array($datos)) {
        ?>
        <tr>
            <td><?php echo $facturas['nombre_producto']; ?></td>
            <td><?php echo $facturas['tipo_producto']; ?></td>
            <td><?php echo $facturas['nombre']; ?></td>
            <td><?php echo $facturas['telefono']; ?></td>
            <td><?php echo $facturas['direccion']; ?></td>
            <td><?php echo $facturas['descripcion']; ?></td>
            <td><?php echo $facturas['fecha_pedido']; ?></td>
        </tr>
        <?php
}
}
function getProducto()
{
    $mysqli    = mostrarPedido();
    $id        = $_POST['id'];
    $query     = "SELECT * FROM 'pedido_producto' WHERE id_producto= $id";
    $result    = $mysqli->query($query);
    $productos = '<option value="0">Elige una opción</option>';
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $productos .= "<option value='$row[id]'>$row[nombre]</option>";
    }
    return $productos;
}
function agregarPedido($id_producto, $id_proveedor)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha = date("Y-m-d H:i:s", time());
    $sql   = "INSERT INTO pedido_producto (id_producto, id_provedor, fecha_pedido) VALUES ('$id_proveedor', '$id_producto', '$fecha')";

    $datos = $conexion->query($sql);
    if ($datos) {
        return true;
    } else {
        return false;
    }
}
function returnProvedores()
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    $sql = "SELECT * FROM provedores";

    $datos = $conexion->query($sql);

    if ($datos) {
        return $datos;
    } else {
        return false;
    }
}
function returnProductos()
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    $sql = "SELECT * FROM productos";

    $datos = $conexion->query($sql);

    if ($datos) {
        return $datos;
    } else {
        return false;
    }
}

function returnProveedorXIdp($idp)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    $sql = "SELECT * FROM productos WHERE id_producto = '$idp'";

    $datos = $conexion->query($sql);

    $lista = mysqli_fetch_array($datos);

    $id_provedor = $lista['id_provedor'];

    return $id_provedor;
}
function returnProductos1($id_producto)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";

    $datos = $conexion->query($sql);
    $lista = mysqli_fetch_array($datos);

    return $lista;

}
function returnProvedor2($id_provedor)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    $sql = "SELECT * FROM provedores WHERE id_provedor = '$id_provedor'";

    $datos = $conexion->query($sql);
    $lista = mysqli_fetch_array($datos);

    return $lista;

}
function returnProvedor($id_provedor)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    $sql = "SELECT * FROM provedores WHERE id_provedor = '$id_provedor'";

    $datos = $conexion->query($sql);

    return $datos;

}

function returnProducto_por_id($id_producto)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    $sql = "SELECT tipo_producto FROM productos WHERE id_producto = '$id_producto'";

    $datos = $conexion->query($sql);

    return $datos;

}

function returnClientes()
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    $sql = "SELECT * FROM clientes";

    $datos = $conexion->query($sql);

    if ($datos) {
        return $datos;
    } else {
        return false;
    }
}
function returnClienteXIdp($idp)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    $sql = "SELECT * FROM clientes WHERE id_cliente = '$idp'";

    $datos = $conexion->query($sql);

    $lista = mysqli_fetch_array($datos);

    $id_cliente = $lista['id_cliente'];

    return $id_cliente;
}
function returnPresupuesto($id_presupuesto)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');
	
    $sql = "SELECT * FROM producto_presupuesto WHERE id_producto_presupuesto = '$id_presupuesto'";
	
    $datos = $conexion->query($sql);
	
    return $datos;
	
}
function returnCliente($id_cliente)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    $sql = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";

    $datos = $conexion->query($sql);

    return $datos;

}

function guardarPresupuesto($idc, $descipcion)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha = date("Y-m-d H:i:s", time());

    $conexion->autocommit(false);

    $sql = "INSERT INTO presupuesto (id_cliente, descripcion, fecha_presupuesto)
    VALUES ('$idc', '$descipcion', '$fecha')";

    $res = $conexion->query($sql);

    if ($res) {

        $id_presupuesto = mysqli_insert_id($conexion);

        session_start();

        $sql3 = "INSERT INTO producto_presupuesto (id_producto, id_presupuesto, tipo_producto, cantidad_producto, metros_producto, precio_producto, total) VALUES";

        for ($i = 0; $i < count($_SESSION['presupuesto']); $i++) {

            $id_producto = $_SESSION['presupuesto'][$i]['idp'];
            $tipo        = $_SESSION['presupuesto'][$i]['tipo'];
            $cantidad    = $_SESSION['presupuesto'][$i]['cantidad'];
            $MTS         = $_SESSION['presupuesto'][$i]['MTS'];
            $precio      = $_SESSION['presupuesto'][$i]['precio'];
            $total       = $_SESSION['presupuesto'][$i]['total'];

            $sql3 .= "('$id_producto', '$id_presupuesto', '$tipo', '$cantidad', '$MTS', '$precio', '$total')";

            if ($i != (count($_SESSION['presupuesto']) - 1)) {
                $sql3 .= ", ";
            }
        }

        $res2 = $conexion->query($sql3);

        if ($res2) {
            $conexion->commit();
            return true;
        } else {
            $conexion->rollback();
            return false;
        }

    } else {
        $conexion->rollback();
        return false;
    }

}
function guardarFactura($idc, $descripcion)
{
    $conexion = new mysqli('localhost', 'root', '', 'datos_sistema');

    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha = date("Y-m-d H:i:s", time());

    $conexion->autocommit(false);

    $sql = "INSERT INTO factura (id_cliente, descripcion, fecha_factura)
    VALUES ('$idc', '$descripcion', '$fecha')";

    $res = $conexion->query($sql);

    if ($res) {

        $id_factura = mysqli_insert_id($conexion);

        session_start();
                    
        $sql3 = "INSERT INTO producto_factura (id_factura, id_producto, tipo_producto, cantidad_producto, metros_producto, precio_producto, total) VALUES";

        for ($i = 0; $i < count($_SESSION['factura']); $i++) {

            $id_producto = $_SESSION['factura'][$i]['idp'];
            $tipo        = $_SESSION['factura'][$i]['tipo'];
            $cantidad    = $_SESSION['factura'][$i]['cantidad'];
            $MTS         = $_SESSION['factura'][$i]['MTS'];
            $precio      = $_SESSION['factura'][$i]['precio'];
            $total       = $_SESSION['factura'][$i]['total'];

            $sql3 .= "('$id_producto', '$id_factura', '$tipo', '$cantidad', '$MTS', '$precio', '$total')";

            if ($i != (count($_SESSION['factura']) - 1)) {
                $sql3 .= ", ";
            }
        }
                    
        $res2 = $conexion->query($sql3);
        
                    
            
        if ($res2) {
				
				
				
            $sql2 = "UPDATE productos SET stock = CASE id_producto ";
			
			for ($i = 0; $i < count($_SESSION['factura']); $i++) {
				$id_producto       = $_SESSION['factura'][$i]['idp'];
				$cantidad = $_SESSION['factura'][$i]['cantidad'];
				
				$sql2 .= "WHEN $id_producto THEN (stock - $cantidad) ";
			}
			$sql2 .= " END WHERE id_producto IN (";
			for ($i = 0; $i < count($_SESSION['factura']); $i++) {
				
				$id_producto = $_SESSION['factura'][$i]['idp'];
				
				$sql2 .= "$id_producto";
				if ($i != (count($_SESSION['factura']) - 1)) {
                    $sql2 .= ", ";
				}
			}
		}
		$sql2 .= ")";
		
		
		$res3 = $conexion->query($sql2);
		if($res3){
			$conexion->commit();
		return true;			
		}else{
				$conexion->rollback();
				return false;
		}
		
        } else {
        $conexion->rollback();
        return false;
    }

}




//TRUNCATE (nombre de la tabla)

?>