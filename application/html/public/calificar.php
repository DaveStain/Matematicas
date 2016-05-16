
<?php
session_start();
if(isset($_SESSION['usuario']) and $_SESSION['usuario']=='admin'){
?>
<div class="logo">
 	<img src="img/logomin.png" href="index.php">
</div>
<div class="container-fluid contenidos">
	<div class="row">
		<div class="col-md-12">
		  	<h1 class="title titles">Respuestas</h1>
		</div>	
		<div class="col-md-12">
		  	<form  class="form-horizontal" role="form" method="post" enctype="multipart/form-data">			
				<div class="col-md-12">
					<div class="form-group">								
	     				<label for="Equipo" class="col-sm-1 control-label">Equipo: </label>	
	     				<div class="col-md-3">
	     					<select id="Equipo" name="Equipo" class="form-control" tabindex="1" required>
			     				<option value="-1">-- Seleccionar equipo --</option>			     				
			     				<?php			     				
			     					$DB = new libs_db_pdo();
			     					$items = array();
									$query = "SELECT idEquipo FROM equipos ORDER BY idEquipo";	
									$params = array();
									// Ejecutamos el query	
									$items= $DB->seleccionar($query,$params);
									$total = count($items);
									for($x=0;$x<$total;$x++) {
										$idcbo = $items[$x]['idEquipo'];
										$nomcbo = "Equipo".$items[$x]['idEquipo'];	
										if($idcbo == 0)	{
												echo "<option value='".$idcbo."'>Administradores</option>";
										}else							
												echo "<option value='".$idcbo."'>".$nomcbo."</option>";
									}
									$DB = null;																	
			     				?>
			     			</select>
					</div>
				</div>
				<div class="col-md-2 col-sm-12">
					<div class="form-group">								
	     				<label for="Pregunta1" class="col-sm-2 control-label">1: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="2" title="Pregunta1" id="Pregunta1" name="Pregunta1"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck1" name="chck1" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta2" class="col-sm-2 control-label">2: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="3" title="Pregunta2" id="Pregunta2" name="Pregunta2"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck2" name="chck2" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta3" class="col-sm-2 control-label">3: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="4" title="Pregunta3" id="Pregunta3" name="Pregunta3"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck3" name="chck3" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta4" class="col-sm-2 control-label">4: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="5" title="Pregunta4" id="Pregunta4" name="Pregunta4"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck4" name="chck4" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta5" class="col-sm-2 control-label">5: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="6" title="Pregunta5" id="Pregunta5" name="Pregunta5"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck5" name="chck5" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div>
	     		</div>
	     		<div class="col-md-2 col-sm-12">
					<div class="form-group">								
	     				<label for="Pregunta6" class="col-sm-2 control-label">6: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="7" title="Pregunta6" id="Pregunta6" name="Pregunta6"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck6" name="chck6" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta7" class="col-sm-2 control-label">7: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="8" title="Pregunta7" id="Pregunta7" name="Pregunta7"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck7" name="chck7" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta8" class="col-sm-2 control-label">8: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="9" title="Pregunta8" id="Pregunta8" name="Pregunta8"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck8" name="chck8" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta9" class="col-sm-2 control-label">9: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="10" title="Pregunta9" id="Pregunta9" name="Pregunta9"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck9" name="chck9" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta10" class="col-sm-2 control-label">10: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="11" title="Pregunta10" id="Pregunta10" name="Pregunta10"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck10" name="chck10" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div>
	     		</div>
	     		<div class="col-md-2 col-sm-12">
					<div class="form-group">								
	     				<label for="Pregunta11" class="col-sm-2 control-label">11: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="12" title="Pregunta11" id="Pregunta11" name="Pregunta11"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck11" name="chck11" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta12" class="col-sm-2 control-label">12: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="13" title="Pregunta12" id="Pregunta12" name="Pregunta12"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck12" name="chck12" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta13" class="col-sm-2 control-label">13: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="14" title="Pregunta13" id="Pregunta13" name="Pregunta13"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck13" name="chck13" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta14" class="col-sm-2 control-label">14: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="15" title="Pregunta14" id="Pregunta14" name="Pregunta14"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
							    <label>
							        <input id="chck14" name="chck14" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta15" class="col-sm-2 control-label">15: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="16" title="Pregunta15" id="Pregunta15" name="Pregunta15"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck15" name="chck15" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div>
	     		</div>	
	     		<div class="col-md-2 col-sm-12">
					<div class="form-group">								
	     				<label for="Pregunta16" class="col-sm-2 control-label">16: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="17" title="Pregunta16" id="Pregunta16" name="Pregunta16"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck16" name="chck16" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta17" class="col-sm-2 control-label">17: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="18" title="Pregunta17" id="Pregunta17" name="Pregunta17"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck17" name="chck17" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta18" class="col-sm-2 control-label">18: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="19" title="Pregunta18" id="Pregunta18" name="Pregunta18"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck18" name="chck18" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta19" class="col-sm-2 control-label">19: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="20" title="Pregunta19" id="Pregunta19" name="Pregunta19"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck19" name="chck19" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta20" class="col-sm-2 control-label">20: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="21" title="Pregunta20" id="Pregunta20" name="Pregunta20"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck20" name="chck20" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div>
	     		</div>	   	     	
	     		<div class="col-md-2 col-sm-12">
					<div class="form-group">								
	     				<label for="Pregunta21" class="col-sm-2 control-label">21: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="22" title="Pregunta21" id="Pregunta21" name="Pregunta21"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck21" name="chck21" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta22" class="col-sm-2 control-label">22: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="23" title="Pregunta22" id="Pregunta22" name="Pregunta22"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck22" name="chck22" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta23" class="col-sm-2 control-label">23: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="24" title="Pregunta23" id="Pregunta23" name="Pregunta23"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck23" name="chck23" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta24" class="col-sm-2 control-label">24: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="25" title="Pregunta24" id="Pregunta24" name="Pregunta24"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck24" name="chck24" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta25" class="col-sm-2 control-label">25: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="26" title="Pregunta25" id="Pregunta25" name="Pregunta25"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck25" name="chck25" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div>
	     		</div>	   	     	
	     		<div class="col-md-2 col-sm-12">
					<div class="form-group">								
	     				<label for="Pregunta26" class="col-sm-2 control-label">26: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="27" title="Pregunta26" id="Pregunta26" name="Pregunta26"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck26" name="chck26" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta27" class="col-sm-2 control-label">27: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="28" title="Pregunta27" id="Pregunta27" name="Pregunta27"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck27" name="chck27" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta28" class="col-sm-2 control-label">28: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="29" title="Pregunta28" id="Pregunta28" name="Pregunta28"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck28" name="chck28" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta29" class="col-sm-2 control-label">29: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="30" title="Pregunta29" id="Pregunta29" name="Pregunta29"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck29" name="chck29" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div> 
						<div class="form-group">								
	     				<label for="Pregunta30" class="col-sm-2 control-label">30: </label>	
		     				<div class="col-xs-6">
		     					<input maxlength="1" type="text" tabindex="31" title="Pregunta30" id="Pregunta30" name="Pregunta30"  class="form-control" placeholder="" autocomplete="off" style=""  /> 
	 						</div>
	 						<div class="col-xs-2 checkbox">
						        <label>
						          <input id="chck30" name="chck30" type="checkbox">Penalizar
						        </label>
					    	</div>
						</div>
	     		</div>	   	     	   	     		   	     			
				<div class="col-xs-12">
					<div class="form-group">
						<div class="enviar">
							<input type="hidden" value="respuestas" name="op">
							<a class="btn btn-sm" href="index.php?op=resultados">Ver Resultados</a>	
							<a class="btn btn-sm" href="index.php?op=menu">Regresar al menú</a>	
							<a class="btn btn-sm" href="index.php?op=logout">Salir</a>					
							<input type="submit" class="btn btn-sm" value="Guardar" id="Guardar" name="Guardar"/>
							
						</div>
					</div>	
				</div>			
			</form>	
		</div>
	</div>
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


<?php

if(isset($_POST["Guardar"]) and $_POST["Guardar"] == "Guardar"){
	
	$Preguntas = array();
	$Penalizadas = array();
	if(isset($_POST["Pregunta1"])){
		$Preguntas[0] = $_POST["Pregunta1"];
	}
	if(isset($_POST["chck1"])){
		$Penalizadas[0] = 1;
	}else{
		$Penalizadas[0] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta2"])){
		$Preguntas[1] = $_POST["Pregunta2"];
	}
	if(isset($_POST["chck2"])){
		$Penalizadas[1] = 1;
	}else{
		$Penalizadas[1] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta3"])){
		$Preguntas[2] = $_POST["Pregunta3"];
	}
	if(isset($_POST["chck3"])){
		$Penalizadas[2] = 1;
	}else{
		$Penalizadas[2] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta4"])){
		$Preguntas[3] = $_POST["Pregunta4"];
	}
	if(isset($_POST["chck4"])){
		$Penalizadas[3] = 1;
	}else{
		$Penalizadas[3] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta5"])){
		$Preguntas[4] = $_POST["Pregunta5"];
	}
	if(isset($_POST["chck5"])){
		$Penalizadas[4] = 1;
	}else{
		$Penalizadas[4] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta6"])){
		$Preguntas[5] = $_POST["Pregunta6"];
	}
	if(isset($_POST["chck6"])){
		$Penalizadas[5] = 1;
	}else{
		$Penalizadas[5] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta7"])){
		$Preguntas[6] = $_POST["Pregunta7"];
	}
	if(isset($_POST["chck7"])){
		$Penalizadas[6] = 1;
	}else{
		$Penalizadas[6] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta8"])){
		$Preguntas[7] = $_POST["Pregunta8"];
	}
	if(isset($_POST["chck8"])){
		$Penalizadas[7] = 1;
	}else{
		$Penalizadas[7] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta9"])){
		$Preguntas[8] = $_POST["Pregunta9"];
	}
	if(isset($_POST["chck9"])){
		$Penalizadas[8] = 1;
	}else{
		$Penalizadas[8] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta10"])){
		$Preguntas[9] = $_POST["Pregunta10"];
	}
	if(isset($_POST["chck10"])){
		$Penalizadas[9] = 1;
	}else{
		$Penalizadas[9] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta11"])){
		$Preguntas[10] = $_POST["Pregunta11"];
	}
	if(isset($_POST["chck11"])){
		$Penalizadas[10] = 1;
	}else{
		$Penalizadas[10] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta12"])){
		$Preguntas[11] = $_POST["Pregunta12"];
	}
	if(isset($_POST["chck12"])){
		$Penalizadas[11] = 1;
	}else{
		$Penalizadas[11] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta13"])){
		$Preguntas[12] = $_POST["Pregunta13"];
	}
	if(isset($_POST["chck13"])){
		$Penalizadas[12] = 1;
	}else{
		$Penalizadas[12] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta14"])){
		$Preguntas[13] = $_POST["Pregunta14"];
	}
	if(isset($_POST["chck14"])){
		$Penalizadas[13] = 1;
	}else{
		$Penalizadas[13] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta15"])){
		$Preguntas[14] = $_POST["Pregunta15"];
	}
	if(isset($_POST["chck15"])){
		$Penalizadas[14] = 1;
	}else{
		$Penalizadas[14] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta16"])){
		$Preguntas[15] = $_POST["Pregunta16"];
	}
	if(isset($_POST["chck16"])){
		$Penalizadas[15] = 1;
	}else{
		$Penalizadas[15] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta17"])){
		$Preguntas[16] = $_POST["Pregunta17"];
	}
	if(isset($_POST["chck17"])){
		$Penalizadas[16] = 1;
	}else{
		$Penalizadas[16] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta18"])){
		$Preguntas[17] = $_POST["Pregunta18"];
	}
	if(isset($_POST["chck18"])){
		$Penalizadas[17] = 1;
	}else{
		$Penalizadas[17] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta19"])){
		$Preguntas[18] = $_POST["Pregunta19"];
	}
	if(isset($_POST["chck19"])){
		$Penalizadas[18] = 1;
	}else{
		$Penalizadas[18] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta20"])){
		$Preguntas[19] = $_POST["Pregunta20"];
	}
	if(isset($_POST["chck20"])){
		$Penalizadas[19] = 1;
	}else{
		$Penalizadas[19] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta21"])){
		$Preguntas[20] = $_POST["Pregunta21"];
	}
	if(isset($_POST["chck21"])){
		$Penalizadas[20] = 1;
	}else{
		$Penalizadas[20] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta22"])){
		$Preguntas[21] = $_POST["Pregunta22"];
	}
	if(isset($_POST["chck22"])){
		$Penalizadas[21] = 1;
	}else{
		$Penalizadas[21] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta23"])){
		$Preguntas[22] = $_POST["Pregunta23"];
	}
	if(isset($_POST["chck23"])){
		$Penalizadas[22] = 1;
	}else{
		$Penalizadas[22] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta24"])){
		$Preguntas[23] = $_POST["Pregunta24"];
	}
	if(isset($_POST["chck24"])){
		$Penalizadas[23] = 1;
	}else{
		$Penalizadas[23] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta25"])){
		$Preguntas[24] = $_POST["Pregunta25"];
	}
	if(isset($_POST["chck25"])){
		$Penalizadas[24] = 1;
	}else{
		$Penalizadas[24] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta26"])){
		$Preguntas[25] = $_POST["Pregunta26"];
	}
	if(isset($_POST["chck26"])){
		$Penalizadas[25] = 1;
	}else{
		$Penalizadas[25] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta27"])){
		$Preguntas[26] = $_POST["Pregunta27"];
	}
	if(isset($_POST["chck27"])){
		$Penalizadas[26] = 1;
	}else{
		$Penalizadas[26] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta28"])){
		$Preguntas[27] = $_POST["Pregunta28"];
	}
	if(isset($_POST["chck28"])){
		$Penalizadas[27] = 1;
	}else{
		$Penalizadas[27] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta29"])){
		$Preguntas[28] = $_POST["Pregunta29"];
	}
	if(isset($_POST["chck29"])){
		$Penalizadas[28] = 1;
	}else{
		$Penalizadas[28] = 0;
	}
	///////////////////////////////////////
	if(isset($_POST["Pregunta30"])){
		$Preguntas[29] = $_POST["Pregunta30"];
	}
	if(isset($_POST["chck30"])){
		$Penalizadas[29] = 1;
	}else{
		$Penalizadas[29] = 0;
	}
	///////////////////////////////////////
	$Equipo = '';
	if(isset($_POST["Equipo"])){
		$Equipo = $_POST["Equipo"];
	}

	$rows = array();
	// include(APPLICATION."/libs/db/pdo.php");

	// Instanciamos la clase
	$DB = new libs_db_pdo();
	$query = "CALL sp_Mat_InsertaRespuesta(?,?,?,?)";
	
	
		$user = $_SESSION['usuario'];
		for($x = 0; $x<30;$x++){
			if($Preguntas[$x]!=""){
				$items = array();	
				$params = array($Preguntas[$x],$x+1,$Penalizadas[$x],$Equipo);
				$total = $DB->actualizar($query,$params);
				
			}
		}
		$query = "CALL sp_Mat_Calificar(?)";
		$params = array($Equipo);
		$total = $DB->actualizar($query,$params);
	// Destruimos el objeto
	$DB = null;
	
	// echo "<pre>Total"; print_r($total); echo "</pre>";
	// echo "<pre>Rows"; print_r($rows); echo "</pre>";
}	
?>