
<?php
session_start();


if(isset($_SESSION['usuario']) && $_SESSION['usuario'] != 'admin'){
$DB = new libs_db_pdo();
$user = $_SESSION['usuario'];
$params2 = array($user);	
$result = array();
$result = $DB->seleccionar("SELECT COUNT(*) as total FROM preguntas WHERE idEquipo =(SELECT idEquipo FROM equipos WHERE Usuario = ?)",$params2);
$count=$result[0]['total'];
		
	if($count > 0){
		echo "<div class='col-sm-12'>";
		echo "<h1 class='title titles'>Respuestas capturadas</h1>";
		echo "<p>Las respuestas de ese equipo ya fueron capturadas, espera los resultados finales</p>";
		echo "</div>";
	}
	else{
?>	
<div class="logo container-fluid">
 	<img src="img/logomin.png" href="index.php">
</div>
<div class="container-fluid contenidos">	
		<div class="col-sm-12">
		  	<h1 class="title titles">Respuestas</h1>		  	
		</div>	
		<div class="col-sm-12">	
			<div class="row">	
		  		<form  class="form-horizontal" role="form" method="post" enctype="multipart/form-data">			
					<div class="col-xs-2">
						<div class="form-group">								
	     				<label for="Pregunta1" class="col-xs-2 control-label">1: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="1" title="Pregunta1" id="Pregunta1" name="Pregunta1"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta2" class="col-xs-2 control-label">2: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="2" title="Pregunta2" id="Pregunta2" name="Pregunta2"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta3" class="col-xs-2 control-label">3: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="3" title="Pregunta3" id="Pregunta3" name="Pregunta3"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta4" class="col-xs-2 control-label">4: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="4" title="Pregunta4" id="Pregunta4" name="Pregunta4"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta5" class="col-xs-2 control-label">5: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="5" title="Pregunta5" id="Pregunta5" name="Pregunta5"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div>
		     		</div>
		     		<div class="col-xs-2">
						<div class="form-group">								
	     				<label for="Pregunta6" class="col-xs-2 control-label">6: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="6" title="Pregunta6" id="Pregunta6" name="Pregunta6"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta7" class="col-xs-2 control-label">7: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="7" title="Pregunta7" id="Pregunta7" name="Pregunta7"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta8" class="col-xs-2 control-label">8: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="8" title="Pregunta8" id="Pregunta8" name="Pregunta8"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta9" class="col-xs-2 control-label">9: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="9" title="Pregunta9" id="Pregunta9" name="Pregunta9"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta10" class="col-xs-2 control-label">10: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="10" title="Pregunta10" id="Pregunta10" name="Pregunta10"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div>
		     		</div>
		     		<div class="col-xs-2">
						<div class="form-group">								
	     				<label for="Pregunta11" class="col-xs-2 control-label">11: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="11" title="Pregunta11" id="Pregunta11" name="Pregunta11"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta12" class="col-xs-2 control-label">12: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="12" title="Pregunta12" id="Pregunta12" name="Pregunta12"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta13" class="col-xs-2 control-label">13: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="13" title="Pregunta13" id="Pregunta13" name="Pregunta13"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta14" class="col-xs-2 control-label">14: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="14" title="Pregunta14" id="Pregunta14" name="Pregunta14"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta15" class="col-xs-2 control-label">15: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="15" title="Pregunta15" id="Pregunta15" name="Pregunta15"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div>
		     		</div>	
		     		<div class="col-xs-2">
						<div class="form-group">								
	     				<label for="Pregunta16" class="col-xs-2 control-label">16: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="16" title="Pregunta16" id="Pregunta16" name="Pregunta16"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta17" class="col-xs-2 control-label">17: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="17" title="Pregunta17" id="Pregunta17" name="Pregunta17"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta18" class="col-xs-2 control-label">18: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="18" title="Pregunta18" id="Pregunta18" name="Pregunta18"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta19" class="col-xs-2 control-label">19: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="19" title="Pregunta19" id="Pregunta19" name="Pregunta19"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta20" class="col-xs-2 control-label">20: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="20" title="Pregunta20" id="Pregunta20" name="Pregunta20"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div>
		     		</div>	   	     	
		     		<div class="col-xs-2">
						<div class="form-group">								
	     				<label for="Pregunta21" class="col-xs-2 control-label">21: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="21" title="Pregunta21" id="Pregunta21" name="Pregunta21"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta22" class="col-xs-2 control-label">22: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="22" title="Pregunta22" id="Pregunta22" name="Pregunta22"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta23" class="col-xs-2 control-label">23: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="23" title="Pregunta23" id="Pregunta23" name="Pregunta23"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta24" class="col-xs-2 control-label">24: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="24" title="Pregunta24" id="Pregunta24" name="Pregunta24"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta25" class="col-xs-2 control-label">25: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="25" title="Pregunta25" id="Pregunta25" name="Pregunta25"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div>
		     		</div>	   	     	
		     		<div class="col-xs-2">
						<div class="form-group">								
	     				<label for="Pregunta26" class="col-xs-2 control-label">26: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="26" title="Pregunta26" id="Pregunta26" name="Pregunta26"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta27" class="col-xs-2 control-label">27: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="27" title="Pregunta27" id="Pregunta27" name="Pregunta27"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta28" class="col-xs-2 control-label">28: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="28" title="Pregunta28" id="Pregunta28" name="Pregunta28"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta29" class="col-xs-2 control-label">29: </label>	
		     				<div class="col-xs-8">
		     					<input maxlength="1" type="text" tabindex="29" title="Pregunta29" id="Pregunta29" name="Pregunta29"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta30" class="col-xs-2 control-label">30: </label>	
		     				<div class="col-xs-8">
		     					<input size="1" maxlength="1" type="text" tabindex="30" title="Pregunta30" id="Pregunta30" name="Pregunta30"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
						</div>
		     		</div>	   	     	   	     		   	     			
					<div class="col-sm-12">
						<div class="form-group">
							<div class="enviar">
								<input type="hidden" value="respuestas" name="op">
								<a class="btn btn-sm" href="index.php?op=logout">Salir</a>					
								<input type="submit" class="btn btn-sm" value="Enviar" id="Enviar" name="Enviar"/>
							</div>
						</div>	
					</div>			
				</form>	
			</div>
		</div>		
</div>
<?php
		}
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

$DB = null;
?>
<?php
if(isset($_POST["Enviar"]) and $_POST["Enviar"] == "Enviar"){
	
	$Preguntas = array();
	if(isset($_POST["Pregunta1"])){
		$Preguntas[0] = $_POST["Pregunta1"];
	}
	if(isset($_POST["Pregunta2"])){
		$Preguntas[1] = $_POST["Pregunta2"];
	}
	if(isset($_POST["Pregunta3"])){
		$Preguntas[2] = $_POST["Pregunta3"];
	}
	if(isset($_POST["Pregunta4"])){
		$Preguntas[3] = $_POST["Pregunta4"];
	}
	if(isset($_POST["Pregunta5"])){
		$Preguntas[4] = $_POST["Pregunta5"];
	}
	if(isset($_POST["Pregunta6"])){
		$Preguntas[5] = $_POST["Pregunta6"];
	}
	if(isset($_POST["Pregunta7"])){
		$Preguntas[6] = $_POST["Pregunta7"];
	}
	if(isset($_POST["Pregunta8"])){
		$Preguntas[7] = $_POST["Pregunta8"];
	}
	if(isset($_POST["Pregunta9"])){
		$Preguntas[8] = $_POST["Pregunta9"];
	}
	if(isset($_POST["Pregunta10"])){
		$Preguntas[9] = $_POST["Pregunta10"];
	}
	if(isset($_POST["Pregunta11"])){
		$Preguntas[10] = $_POST["Pregunta11"];
	}
	if(isset($_POST["Pregunta12"])){
		$Preguntas[11] = $_POST["Pregunta12"];
	}
	if(isset($_POST["Pregunta13"])){
		$Preguntas[12] = $_POST["Pregunta13"];
	}
	if(isset($_POST["Pregunta14"])){
		$Preguntas[13] = $_POST["Pregunta14"];
	}
	if(isset($_POST["Pregunta15"])){
		$Preguntas[14] = $_POST["Pregunta15"];
	}
	if(isset($_POST["Pregunta16"])){
		$Preguntas[15] = $_POST["Pregunta16"];
	}
	if(isset($_POST["Pregunta17"])){
		$Preguntas[16] = $_POST["Pregunta17"];
	}
	if(isset($_POST["Pregunta18"])){
		$Preguntas[17] = $_POST["Pregunta18"];
	}
	if(isset($_POST["Pregunta19"])){
		$Preguntas[18] = $_POST["Pregunta19"];
	}
	if(isset($_POST["Pregunta20"])){
		$Preguntas[19] = $_POST["Pregunta20"];
	}
	if(isset($_POST["Pregunta21"])){
		$Preguntas[20] = $_POST["Pregunta21"];
	}
	if(isset($_POST["Pregunta22"])){
		$Preguntas[21] = $_POST["Pregunta22"];
	}
	if(isset($_POST["Pregunta23"])){
		$Preguntas[22] = $_POST["Pregunta23"];
	}
	if(isset($_POST["Pregunta24"])){
		$Preguntas[23] = $_POST["Pregunta24"];
	}
	if(isset($_POST["Pregunta25"])){
		$Preguntas[24] = $_POST["Pregunta25"];
	}
	if(isset($_POST["Pregunta26"])){
		$Preguntas[25] = $_POST["Pregunta26"];
	}
	if(isset($_POST["Pregunta27"])){
		$Preguntas[26] = $_POST["Pregunta27"];
	}
	if(isset($_POST["Pregunta28"])){
		$Preguntas[27] = $_POST["Pregunta28"];
	}
	if(isset($_POST["Pregunta29"])){
		$Preguntas[28] = $_POST["Pregunta29"];
	}
	if(isset($_POST["Pregunta30"])){
		$Preguntas[29] = $_POST["Pregunta30"];
	}
	$rows = array();
	// include(APPLICATION."/libs/db/pdo.php");

	// Instanciamos la clase
	$DB = new libs_db_pdo();
	$query = "CALL sp_Mat_InsertaRespuesta(?,?,?,?)";	
	
		$user = $_SESSION['usuario'];
		$params2 = array($user);	
		$result = array();
		$result = $DB->seleccionar("SELECT idEquipo FROM equipos WHERE Usuario = ?",$params2);
		$eq=$result[0]['idEquipo'];
		$num=29;
		$penalizado = 0;
		for ($i=0; $i < 30; $i++) { 
			if($Preguntas[$i] != ""){
				$params = array($Preguntas[$i],$i+1,$penalizado,$eq);
				$DB->actualizar($query,$params);
			}
		}
		
		$query = "CALL sp_Mat_Calificar(?)";
		$params = array($Equipo);
		$total = $DB->actualizar($query,$params);
		/*foreach ($Preguntas as $r) {			
						
			if($r != ""){	
				echo "entro";			
				$params = array($Preguntas[29],$num,$penalizado,$eq);
				$DB->actualizar($query,$params);
				echo "fin ";
			}
			$num++;
		}*/
		/*for ($i=0; $i < 30; $i++) { 
			$res=$Preguntas[$i];						
			$penalizado = 0;
			$num = $i+1;			
			if($res!=""){	
				echo "entro";			
				$params = array($res,$num,$penalizado,$eq);
				$DB->actualizar($query,$params);
				echo "fin ";
			}
		}*/
		
	
	// Destruimos el objeto
	$DB = null;
	
	// echo "<pre>Total"; print_r($total); echo "</pre>";
	// echo "<pre>Rows"; print_r($rows); echo "</pre>";
}	
?>
