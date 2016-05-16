<?php
session_start();
if(isset($_SESSION['usuario']) and $_SESSION['usuario']=='admin'){
?>
<div class="col-md-5 mainmenu">
	<h1 class="titles"><b>Reportes</b></h1>
	<a id="Result" class="btn btn-sm btnmenu" href="index.php?op=reporteEq">Reporte por equipos</a>	
	<a id="Reports" class="btn btn-sm btnmenu" href="index.php?op=reporteFin">Reporte final</a>
	<a id="logout" class="btn btn-sm btnmenu" href="index.php?op=reporteEval">Evaluacion dificultad</a>
	
</div>
<?php
}
else
{
	if(isset($_SESSION['usuario'])){
		header("Location: index.php?op=logout");
	}
		
	else{
		header("Location: index.php?op=login");
	}
}
?>