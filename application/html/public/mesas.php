
<div class="container contenidos">
	<div class="row">
	    <h1 class="lead titles">Mapa de equipos</h1>    
	</div>
<?php
	$DB = new libs_db_pdo();
	$items = array();
	$query = "SELECT MAX(Mesa)as total FROM equipos";	
	$params = array();
	// Ejecutamos el query	
	$items= $DB->seleccionar($query,$params);
	$total = $items[0]['total'];
	echo $total;	
	for($x=1;$x<=$total;$x++){
		$query = "SELECT idEquipo FROM equipos WHERE Mesa = ".$x;	
		$params = array();
		// Ejecutamos el query	
		$items= $DB->seleccionar($query,$params);
		
			if(count($items)==2){
				$eq1 = $items[0]['idEquipo'];
				$eq2 = $items[1]['idEquipo'];			
			}
			else if(count($items)==1){
				$eq1 = $items[0]['idEquipo'];
				$eq2 = 'Vacío';
			}else{
				$eq1 = 'Vacío';
				$eq2 = 'Vacío';
			}
				
			
			echo "<div class='col-md-2 mesas'> <h3>Mesa ".$x."</h3>";
			echo "<table class='table table-bordered'>";		
			echo "<td>".$eq1."</td>";
			echo "<td>".$eq2."</td>";
			echo "</tr>";
			echo "</table>";
			echo "</div>";
		}
	
?>
</div>