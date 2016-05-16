
<?php

if(isset($_SESSION['usuario']) and $_SESSION['usuario']=='admin'){
	$DB = new libs_db_pdo();
	$items = array();
	$query = "CALL sp_ReporteEquipos";	
	$params = array();
	// Ejecutamos el query	
	$items= $DB->seleccionar($query,$params);
?>