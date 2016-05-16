<?php
session_start();
if(isset($_SESSION['usuario']) and $_SESSION['usuario']=='admin'){
?>
<div class="logo">
 	<img src="img/logomin.png" href="index.php">
</div>
<div class="container contenidos">
<div class="row">
    <h1 class="lead titles">XIX Concurso Regional de Matemáticas por equipos</h1>
    <p class="lead titles">nivel Bachillerato</p>    
    <p class="lead titles">Resultados de concurso</p>
</div>
<div class="col-md-10 col-md-offset-1">
    <?php
    	$DB = new libs_db_pdo();
		$items = array();
		$query = "SELECT Eq.idEquipo,Es.Nombre,Eq.Integrante1,Eq.Integrante2,Eq.Integrante3,Eq.Puntos from equipos Eq
				  INNER JOIN escuelas Es on Es.idEscuela = Eq.idEscuela
				  WHERE idEquipo>0 order by Eq.Puntos desc";	
		$params = array();
		// Ejecutamos el query	
		$items= $DB->seleccionar($query,$params);
		$total = count($items);		
    ?>
    
    <table class="table table-bordered">   	
    	<tr>
	    	<th>Equipo</th>
	    	<th>Escuela</th>
	    	<th>Integrantes</th>
	    	<th>Puntos</th>
    	</tr>
        <?php
            for($i = 0;$i<$total;$i++){
            	echo "<tr>";
            		echo "<td rowspan=\"3\">".$items[$i]['idEquipo']."</td>";
            		echo "<td rowspan=\"3\">".$items[$i]['Nombre']."</td>";
            		echo "<td>".$items[$i]['Integrante1']."</td>";
            		echo "<td rowspan=\"3\">".$items[$i]['Puntos']."</td>";
            	echo "</tr>";
            	echo "<tr>";
            		echo "<td>".$items[$i]['Integrante2']."</td>";
            	echo "</tr>";
            	echo "<tr>";
            	echo "<td>".$items[$i]['Integrante3']."</td>";
            	echo "</tr>";
            }
        ?>
    </table>
    <a class="btn btn-sm" href="index.php?op=menu">Regresar al menú</a> 
    <a class="btn btn-sm" href="index.php?op=calificar">Calificar Equipos</a>	
	<a class="btn btn-sm" href="index.php?op=logout">Salir</a>
</div>
</div> <!-- /container -->
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