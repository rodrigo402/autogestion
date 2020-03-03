<?php 
include_once 'includes/conexion.php';
?>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
            function imprimir() {
                if (window.print) {
                    window.print();
                } else {
                    alert("La función de impresion no esta soportada por su navegador.");
                }
            }
        </script>
    </head>
    <body onload="imprimir();">
    	<CENTER><p>PRODUCTOS CARGADOS</p></CENTER>
        <table border="1px" align="center">
            <thead>
                <th></th>
                <th>nombre del producto</th>
                <th>tipo del producto</th>
                <th>precio neto</th>
                <th>stock - disponible</th>
                <th>Proveedor</th>
            </thead>
            <?php
                include_once 'includes/conexion.php';
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
        
        </tr>
         <?php }?>
        </table>

    </body>
