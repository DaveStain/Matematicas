<?php
session_start();
if(isset($_SESSION['usuario']) and $_SESSION['usuario']=='admin'){
?>
<div class="col-md-5 mainmenu">
	<h1 class="titles"><b>Panel de control</b></h1>
	<input type="submit" class="btn btn-sm btnmenu" value="Abrir Concurso" id="iniCon" name="Abrir Concurso"/>
	<input type="submit" class="btn btn-sm btnmenu" value="Cerrar Concurso" id="cierCon" name="Cerrar Concurso"/>
	<input type="submit" class="btn btn-sm btnmenu" value="Abrir Inscripciones" id="Abrir" name="Abrir Inscripciones"/>
	<input type="submit" class="btn btn-sm btnmenu" value="Cerrar Inscripciones" id="Cerrar" name="Cerrar Inscripciones"/>
	<a id="Salir" class="btn btn-sm btnmenu" href="index.php?op=mesas">Mesas</a>
	<a id="Calificar" class="btn btn-sm btnmenu" href="index.php?op=calificar">Calificar</a>
	<a id="Result" class="btn btn-sm btnmenu" href="index.php?op=resultados">Resultados</a>	
	<a id="Reports" class="btn btn-sm btnmenu" href="index.php?op=menureportes">Reportes</a>
	<a id="logout" class="btn btn-sm btnmenu" href="index.php?op=logout">Salir</a>
	
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