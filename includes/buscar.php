<?php 
$conexion= new mysqli ('localhost', 'root', '', 'datos_sistema');
function buscarClientes()
{
    if (isset($_POST['buscador']))
    // Tomamos el valor ingresado
    $buscar = $_POST['palabra'];
    // Si está vacío, lo informamos, sino realizamos la búsqueda
    if(empty($buscar))
    {
        }else{
        // Conexión a la base de datos y seleccion de registros
        $conexion   = new mysqli ('localhost', 'root', '', 'datos_sistema');
        $datos = "SELECT * FROM clientes WHERE nombre  like '%$buscar%' ORDER BY id_cliente DESC";
        $result = mysqli_query($conexion,$datos);
        //$result = $conexion->query($datos); 
        // Tomamos el total de los resultados
        $total = mysqli_num_rows($result);  
    ?>
    <table class="table table-condensed">
    <tr class="info">
        <th>LEGAJO</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>TELEFONO</th>
        <th>DIRECCION</th>
        <th>DNI</th>
    </tr>
    <?php
        if ($row = mysqli_fetch_array($result)){
            do {
            ?>  
            <tr>
            <td><?php echo $row['id_cliente']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['dni']; ?></td>
            <td><a href="nuevo_cliente.php?id=<?php echo $row['id_cliente']; ?>"><button class="btn btn-danger">ELIMINAR</button></a></td>
            <td><a class="editar" href="editar_cliente.php?id=<?php echo $row['id_cliente']; ?>"><button  class="btn btn-primary">EDITAR</button></a></td>
            </tr>
            <?
            } while ($row = mysqli_fetch_array($result)); 
        } else { 
            // En caso de no encontrar resultados
            echo "<script> alert('Cliente no existe'); </script>"; 
        }
    }
}
function buscarproducto()
{
    if (isset($_POST['buscador']))
    // Tomamos el valor ingresado
    $buscar = $_POST['palabra'];
    // Si está vacío, lo informamos, sino realizamos la búsqueda
    if(empty($buscar))
    {
        }else{
        // Conexión a la base de datos y seleccion de registros
        $conexion   = new mysqli ('localhost', 'root', '', 'datos_sistema');
        $datos = "SELECT * FROM productos WHERE nombre_producto like '%$buscar%' ORDER BY id_producto DESC";
        $result = mysqli_query($conexion,$datos);
        //$result = $conexion->query($datos); 
        // Tomamos el total de los resultados
        $total = mysqli_num_rows($result);  
    ?>
    <table class="table table-condensed">
    <tr class="info">
    <th>Legajo</th>
    <th>Nombre del Producto</th>
    <th>Tipo del Producto</th>
    <th>Precio Neto</th>
    <th>Stock - Disponible</th>
    </tr>
    <?php
        if ($row = mysqli_fetch_array($result)){
            do {
            ?>  
            <tr>
            <td><?php echo $row['id_producto']; ?></td>
            <td><?php echo $row['nombre_producto']; ?></td>
            <td><?php echo $row['tipo_producto']; ?></td>
            <td>$<?php echo $row['precioneto']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><a href="productos.php?id=<?php echo $row['id_producto']; ?>"><button class="btn btn-danger">ELIMINAR</button></a></td>
            <td><a class="editar" href="editar_producto.php?id=<?php echo $row['id_producto']; ?>"><button  class="btn btn-primary">EDITAR</button></a></td>
            </tr>
            <?
            } while ($row = mysqli_fetch_array($result)); 
        } else { 
            // En caso de no encontrar resultados
            echo "<script> alert('Producto no existe'); </script>";  
        }
    }
}
function buscarfactura()
{
    if (isset($_POST['buscador']))
    // Tomamos el valor ingresado
    $buscar = $_POST['palabra'];
    // Si está vacío, lo informamos, sino realizamos la búsqueda
    if(empty($buscar))
    {
        }else{
        // Conexión a la base de datos y seleccion de registros
        $conexion   = new mysqli ('localhost', 'root', '', 'datos_sistema');
        $datos = "SELECT * FROM facturas WHERE fecha_factura  like '%$buscar%' ORDER BY id_factura DESC";
        $result = mysqli_query($conexion,$datos);
        //$result = $conexion->query($datos); 
        // Tomamos el total de los resultados
        $total = mysqli_num_rows($result);  
    ?>
    <table border="1px" align="center">
   <thead>
        <th>FECHA</th>
        <th>nombre del cliente</th>
        <th>apellido del cliente</th>
        <th>telefono del cliente</th>
        <th>direccion del cliente</th>
        <th>DNI del cliente</th>
        <th>producto</th>
        <th>cantidad</th>
        <th>precio</th>
        <th>precio total</th>
    </thead>
   <?php
        if ($row = mysqli_fetch_array($result)){
            do {
            ?>  
    <tr>
        <td><?php echo $facturas['fecha_factura'];?></td>
        <td><?php echo $facturas['nombre'];?></td>
        <td><?php echo $facturas['apellido'];?></td>
        <td><?php echo $facturas['telefono'];?></td>
        <td><?php echo $facturas['direccion'];?></td>
        <td><?php echo $facturas['dni'];?></td>
        <td><?php echo $facturas['nombre_producto'];?></td>
        <td><?php echo $facturas['cantidad_producto'];?></td>
        <td><?php echo $facturas['precio_producto'];?></td>
        <td><?php echo $facturas['precio_total'];?></td>
    </tr>
            <?
            } while ($row = mysqli_fetch_array($result)); 
        } else { 
            // En caso de no encontrar resultados
            echo "NO EXISTE <br>" ; 
        }
    }
}
function buscarProveedor()
{
    if (isset($_POST['buscador']))
    // Tomamos el valor ingresado
    $buscar = $_POST['palabra'];
    // Si está vacío, lo informamos, sino realizamos la búsqueda
    if(empty($buscar))
    {
        }else{
        // Conexión a la base de datos y seleccion de registros
        $conexion   = new mysqli ('localhost', 'root', '', 'datos_sistema');
        $datos = "SELECT * FROM provedores WHERE nombre like '%$buscar%' ORDER BY id_provedor DESC";
        $result = mysqli_query($conexion,$datos);
        //$result = $conexion->query($datos); 
        // Tomamos el total de los resultados
        $total = mysqli_num_rows($result);  
    ?>
    <table class="table table-condensed">
    <tr class="info">
        <th>Legajo</th>
        <th>Producto</th>
        <th>Telefono</th>
        <th>Direccion</th>
       
    </tr>
   <?php
        if ($row = mysqli_fetch_array($result)){
            do {
            ?>  
   <tr>
            <td><?php echo $row['id_provedor']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
             <td><a href="proveedores.php?id=<?php echo $row['id_provedor']; ?>"><button class="btn btn-danger">ELIMINAR</button></a></td>
            <td><a href="editar_proveedor.php?id=<?php echo $row['id_provedor']; ?>"><button  class="btn btn-primary">EDITAR</button></a></td>
        </tr>
            <?
            } while ($row = mysqli_fetch_array($result)); 
        } else { 
            // En caso de no encontrar resultados
             echo "<script> alert('Proveedor no existe'); </script>"; 
        }
    }
}
?>