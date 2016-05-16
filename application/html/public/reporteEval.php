
<div class="container contenidos">
	<div class="row">
	    <h1 class="lead titles">Reporte de Dificultad</h1>    
	</div>
<?php
	$DB = new libs_db_pdo();
	$items = array();
	$query = "CALL sp_EvaluarPreguntas";	
	$params = array();
	// Ejecutamos el query	
	$items= $DB->seleccionar($query,$params);
	if(count($items) > 0){
		echo "<div class='col-xs-12 col-md-10'>";
		echo "<table class='table table-bordered'>";
		echo "<tr>
				<th>Numero de Pregunta</th>
				<th>Procentaje de acierto</th>
			</tr>"	;
	for($x=0;$x<count($items);$x++){			
		echo "<tr>"	;
		echo "<td>".$items[$x]['idPregunta']."</td>";
		echo "<td>". number_format($items[$x]['Percent'])."%</td>";
		echo "</tr>";
		
		}
		echo "</table>";
		echo "</div>";
	}
	
?>
</div>