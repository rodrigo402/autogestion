


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>LOGIN</title>
	<link rel="STYLESHEET" type="text/css" href="style/estilo_login.css">
	<link rel="STYLESHEET"  href="style/prueba.css">
	<link rel="STYLESHEET"  href="css/bootstrap.min.css">
	<script src="javascripts/validar.js" type="text/javascript" charset="utf-8"></script>
	
</head>
<body>
	<div class="titulo2"><h1>BIENVENIDO</h1></div>
<div class="editar3">
	<form method="POST" action="includes/validar.php">
		<label>USUARIO</label>
			<input type="text" name="nnombre"required placeholder="Usuario" class="form-control" autocomplete="off"/>
		<br>
		<label>CONTRASEÑA</label>
			<input type="password" name="npassword"required placeholder="Contraseña" class="form-control" autocomplete="off" /><br>
		<br>
		<center><button type="submit" class="btn btn-info">Iniciar Sesion</button></center>
	</form>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>	

<?php
if (isset($_GET['error'])) {
    if ($_GET['error']) {
        echo "<script>alert('contraseña incorrecta');</script>";
    }
}

?>