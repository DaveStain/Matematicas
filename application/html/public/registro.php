<?php
	$DB = new libs_db_pdo();
	$params = array();
	$items = array();
	$query = "SELECT count(*) AS total FROM equipos";
	$items= $DB->seleccionar($query,$params);
	$total = $items[0]['total'];
	$query = "SELECT Estatus as activo FROM detalles where Descripcion='Concurso'";
	$items= $DB->seleccionar($query,$params);
	$activo = $items[0]['activo'];
	$query = "SELECT Estatus as activo FROM detalles where Descripcion='Inscripciones'";
	$items= $DB->seleccionar($query,$params);
	$registro = $items[0]['activo'];
	$DB=null;
	session_start();
if(isset($_POST["Guardar2"]) and !empty($_POST["Guardar2"]))
{
	$Nombre = "";
	$Direccion = "";
	$Tel = "";
	if(isset($_POST["Nombre"])){
		$Nombre = $_POST["Nombre"];
	}
	if(isset($_POST["direccion"])){
		$Direccion = $_POST["direccion"];
	}
	if(isset($_POST["telefono"])){
		$Tel = $_POST["telefono"];
	}
	$DB = new libs_db_pdo();
	$params = array($Nombre,$Direccion,$Tel);
	$items = array();
	$query = "CALL sp_Mat_InsertaEscuela(?,?,?)";
	$DB->actualizar($query,$params);
	$DB =null;

}

if((isset($_SESSION['usuario']) and $_SESSION['usuario'] == "admin") or ($total < 121 ) or $activo = '0' or $registro = '0' )
	{
?>
 <div class="logo">
 	<img src="img/logomin.png" href="index.php">
 </div>
 <div class="container contenidos">
	<div class="row">
		<div class="col-sm-12">
		  	<h1 class="title titles">Registro de equipos</h1>
		</div>	
		<div class="col-sm-12">
		  	<form id="formID" class="form-inline" name="formID" role="form" method="post" enctype="multipart/form-data" action="index.php?op=registro">			
			  	<div class="form-group">
				 	<div class="col-sm-12 register">
				 		<div class="col-sm-12 col-md-7">
				 			<label for='Escuela'>Escuela: </label>
				 	    	<select id="Escuela" name="Escuela" class="form-control" tabindex="1" required>
			     				<option value="0">-- Selecciona tu escuela --</option>
			     				<?php
				     				if (!isset($_GET["id"])){
				     					$DB = new libs_db_pdo();
				     					$items = array();
										$query = "SELECT * FROM escuelas";	
										$params = array();
										// Ejecutamos el query	
										$items= $DB->seleccionar($query,$params);
										$total = count($items);
										for($x=0;$x<$total;$x++) {
											$idcbo = $items[$x]['idEscuela'];
											$nomcbo = $items[$x]['Nombre'];
											echo "<option value='$idcbo'>$nomcbo</option>";
										}
										$DB = null;
									}										
			     				?>
			     			</select>
			     			<p id="pInfo" class="info">¿No encuentra su escuela?<a id="regis" class="areg">Registrar</a><p>
				 	    </div> 				 	    
					</div>
					<div id="modificar" class="col-sm-12 register">	
						<div class="form-group">
						    <label id="pass1" for='Password' class="col-sm-2 control-label">Contraseña:</label>
						    <div class="col-sm-6">
						      	<input class="form-control" type="password" tabindex="2" title="Contraseña" value="" id="Password" name="Password" placeholder="•••••••••" autocomplete="off" style="">
						      	
						    </div>
						    <a id="Validar" class="btn btn-sm">Validar</a>
						    <div id="errorc"></div>
				 	    	</div>
						</div>	
					</div>	
											
			 		<div id="nueva" class="col-sm-12 col-md-10">	
			 			<form class="form-inline" name="form2" role="form" method="post" enctype="multipart/form-data" action="index.php?op=registro">	     				
				 			<div class="form-group">
				 				<label for='Nombre' class="col-sm-2 control-label">Datos de la escuela:</label>
			     				<input type="text" tabindex="2" title="Nombre" id="Nombre" name="Nombre"  class="form-control" placeholder="Nombre de la institución" autocomplete="off" style=""  required/>		     					
			     			</div>		     				
		     				<div class="form-group">
		     					<input type="text" tabindex="3" title="telefono" id="telefono" name="telefono"  class="form-control" placeholder="Teléfono" autocomplete="off" style=""/> 
		     				</div>
		     				<div class="form-group">
				 	    		<input type="text" tabindex="4" title="direccion" id="direccion" name="direccion"  class="form-control" placeholder="Dirección" autocomplete="off" style=""  required/> 				 	    		
				 	    	</div>
				 	    	<div class="form-group">
				 	    		<input type="submit" class="btn btn-sm" style="margin-top: 10px;" value="Guardar" id="Guardar2" name="Guardar2"/>
				 	    		<div id="errorn"></div>
				 	    	</div>
			 	    	</form>				 	    	
			 	    </div>  	
					<div class="col-sm-12">
					 	<div id="AsesoresIni" class="col-sm-4">		     				
				 			<label for='CantAsesores'>Asesores </label>
				 	    	<select id="CantAsesores" name="CantAsesores" class="form-control" tabindex="1" required>
			     				<option value="0">-</option>
			     				<option value="1">1</option>
			     				<option value="2">2</option>
			     				<option value="3">3</option>
			     				<option value="4">4</option>
			     			</select>				 	    
				 	    </div>
				 	    <div id="Asesores" class="col-sm-12 register">						
				 		<div class="col-sm-5">		     				
					 		<label for='Asesor'>Asesor(es):</label>
					 		<div class="space">
					 			<input type="text" tabindex="5" title="Asesor1" id="Asesor1" name="Asesor1"  class="form-control" placeholder="Nombre del Asesor" autocomplete="off" required/>
					 		</div> 
					 		<div class="space">
					 			<input type="text" tabindex="6" title="Asesor2" id="Asesor2" name="Asesor2"  class="form-control" placeholder="Nombre del Asesor" autocomplete="off" required/>
					 		</div> 
					 		<div class="space">
					 			<input type="text" tabindex="7" title="Asesor3" id="Asesor3" name="Asesor3"  class="form-control" placeholder="Nombre del Asesor" autocomplete="off" required/>
					 		</div>
					 		<div class="space">
					 			<input type="text" tabindex="8" title="Asesor4" id="Asesor4" name="Asesor4"  class="form-control" placeholder="Nombre del Asesor" autocomplete="off" required/>
					 		</div>    				
				 	    </div>  
				 	    <div class="col-sm-5">
				 	    <label for='Mail'>Correo electrónico:</label>
				 	    	<div class="space">
				 	    		<input type="text" tabindex="9" title="Mail" id="Mail" name="Mail"  class="form-control" placeholder="e-mail@ejemplo.com" autocomplete="off" style=""  required/> 
				 	    		<p class="info">A este correo se enviará toda la información del registro.</p>
				 	    	</div>
				 	    </div>					
					</div>
					</div>
					<?php
					if (!isset($_SESSION['usuario'])) {					
					
					?>
					<div class="col-sm-12">
				 	    <div id="EquiposIni" class="col-sm-4 space">	
					 		<label for='CantEquipo'>Seleccione equipos a capturar: </label>
				 	    	<select id="CantEquipo" name="CantEquipo" class="form-control" tabindex="1" required>
			     				<option value="0">-</option>
			     				<option value="1">1</option>
			     				<option value="2">2</option>
			     				<option value="3">3</option>  
			     			</select>		
						</div>	
					</div>
					<?php
						}
					?>	
					<div id="E1" class="col-sm-4 space">
						<div class="form-group">			     			
		     				<label for='Integrantes'>Integrantes Equipo 1:</label>
		     				<div class="space">
		     					<input type="text" tabindex="10" title="Integrante1" id="E1Integrante1" name="E1Integrante1"  class="form-control" placeholder="Nombre integrante 1" autocomplete="off" style="" required /> 
		     				</div>
		     				<div class="space">
		     					<input type="text" tabindex="11" title="Integrante2" id="E1Integrante2" name="E1Integrante2"  class="form-control" placeholder="Nombre integrante 2" autocomplete="off" style="" required /> 
		     				</div>
		     				<div class="space">
		     					<input type="text" tabindex="12" title="Integrante3" id="E1Integrante3" name="E1Integrante3"  class="form-control" placeholder="Nombre integrante 3" autocomplete="off" style="" required />
		     				</div>
		     			</div>  
					</div>
					
					<div id="E2" class="col-sm-4 space">
						<div class="form-group">			     			
		     				<label for='Integrantes'>Integrantes Equipo 2:</label>
		     				<div class="space">
		     					<input  type="text" tabindex="13" title="Integrante1" id="E2Integrante1" name="E2Integrante1"  class="form-control" placeholder="Nombre integrante 1" autocomplete="off" style=""  /> 
		     				</div>
		     				<div class="space">
		     					<input  type="text" tabindex="14" title="Integrante2" id="E2Integrante2" name="E2Integrante2"  class="form-control" placeholder="Nombre integrante 2" autocomplete="off" style=""  /> 
		     				</div>
		     				<div class="space"> 
		     					<input  type="text" tabindex="15" title="Integrante3" id="E2Integrante3" name="E2Integrante3"  class="form-control" placeholder="Nombre integrante 3" autocomplete="off" style=""  />
		     				</div>
		     			</div>  
					</div>
						
					<div id="E3" class="col-sm-4 space">
						<div class="form-group">			     			
		     				<label for='Integrantes'>Integrantes Equipo 3:</label>
		     				<div class="space">
		     					<input  type="text" tabindex="16" title="Integrante1" id="E3Integrante1" name="E3Integrante1"  class="form-control" placeholder="Nombre integrante 1" autocomplete="off" style=""  /> 
		     				</div>
		     				<div class="space">
		     					<input  type="text" tabindex="17" title="Integrante2" id="E3Integrante2" name="E3Integrante2"  class="form-control" placeholder="Nombre integrante 2" autocomplete="off" style=""  /> 
		     				</div>
		     				<div class="space"> 
		     					<input  type="text" tabindex="18" title="Integrante3" id="E3Integrante3" name="E3Integrante3"  class="form-control" placeholder="Nombre integrante 3" autocomplete="off" style=""  />
		     				</div>
		     			</div>  
					</div>
					<?php
					if ((isset($_SESSION['usuario']) and $_SESSION['usuario'] == "admin")) {					
					
					?>
					<div id="E4" class="col-sm-4 space">
						<div class="form-group">			     			
		     				<label for='Integrantes'>Integrantes Equipo 4:</label>
		     				<div class="space">
		     					<input  type="text" tabindex="19" title="Integrante1" id="E4Integrante1" name="E4Integrante1"  class="form-control" placeholder="Nombre integrante 1" autocomplete="off" style=""  /> 
		     				</div>
		     				<div class="space">
		     					<input  type="text" tabindex="20" title="Integrante2" id="E4Integrante2" name="E4Integrante2"  class="form-control" placeholder="Nombre integrante 2" autocomplete="off" style=""  /> 
		     				</div>
		     				<div class="space"> 
		     					<input  type="text" tabindex="21" title="Integrante3" id="E4Integrante3" name="E4Integrante3"  class="form-control" placeholder="Nombre integrante 3" autocomplete="off" style=""  />
		     				</div>
		     			</div>  
					</div>

					<div id="E5" class="col-sm-4 space">
						<div class="form-group">			     			
		     				<label for='Integrantes'>Integrantes Equipo 5:</label>
		     				<div class="space">
		     					<input  type="text" tabindex="22" title="Integrante1" id="E5Integrante1" name="E5Integrante1"  class="form-control" placeholder="Nombre integrante 1" autocomplete="off" style=""  /> 
		     				</div>
		     				<div class="space">
		     					<input  type="text" tabindex="23" title="Integrante2" id="E5Integrante2" name="E5Integrante2"  class="form-control" placeholder="Nombre integrante 2" autocomplete="off" style=""  /> 
		     				</div>
		     				<div class="space"> 
		     					<input  type="text" tabindex="24" title="Integrante3" id="E5Integrante3" name="E5Integrante3"  class="form-control" placeholder="Nombre integrante 3" autocomplete="off" style=""  />
		     				</div>
		     			</div>  
					</div>
				
					<?php
						}
					?>
					<div id="end" class="col-sm-12">
						<div class="form-group">
							<div class="enviar">
								<input type="hidden" value="registro" name="op">
								<a id="Salir" class="btn btn-sm" href="index.php?op=inicio">Salir</a>					
								<input type="submit" class="btn btn-sm" value="Guardar" id="Guardar" name="Guardar"/>
							</div>
						</div>
					</div>	
					
				</div>
			</form>
		</div>
	</div>

 </div>
<?php
}
else{
	echo "<h1 class='titles'>Cupo agotado, no existen mas lugares disponibles<h1>";
	echo "<div><a href='index.php?op=inicio'>Salir</a></div>";
}
?>


<?php

if(isset($_POST["Guardar"]) and $_POST["Guardar"] == "Guardar"){
	$mensaje = "";
	$para = "";
	$titulo = "";	
	
	
	if(isset($_POST["Mail"])){
		$para = $_POST["Mail"];
	}
	$titulo = "Información de registro para concurso de matemáticas";
	

	/////////////////////
	$Escuela = "";
	if(isset($_POST["Escuela"])){
		$Escuela = $_POST["Escuela"];
	}

	$Mail = "";
	if(isset($_POST["Mail"])){
		$Mail = $_POST["Mail"];
	}

	$Asesores = array();
	$Asesores[0] = "";
	if(isset($_POST["Asesor1"])){
	}
		$Asesores[0] = $_POST["Asesor1"];

	$Asesores[1] = "";
	if(isset($_POST["Asesor2"])){
		$Asesores[1] = $_POST["Asesor2"];
	}
	$Asesores[2] = "";
	if(isset($_POST["Asesor3"])){
		$Asesores[2] = $_POST["Asesor3"];
	}
	$Asesores[3] = "";
	if(isset($_POST["Asesor4"])){
		$Asesores[3] = $_POST["Asesor4"];
	}

	$E1Integrante1 = "";
	if(isset($_POST["E1Integrante1"])){
		$E1Integrante1 = $_POST["E1Integrante1"];
	}

	$E1Integrante2 = "";
	if(isset($_POST["E1Integrante2"])){
		$E1Integrante2 = $_POST["E1Integrante2"];
	}

	$E1Integrante3 = "";
	if(isset($_POST["E1Integrante3"])){
		$E1Integrante3 = $_POST["E1Integrante3"];
	}

	$E2Integrante1 = "";
	if(isset($_POST["E2Integrante1"])){
		$E2Integrante1 = $_POST["E2Integrante1"];
	}

	$E2Integrante2 = "";
	if(isset($_POST["E2Integrante2"])){
		$E2Integrante2 = $_POST["E2Integrante2"];
	}

	$E2Integrante3 = "";
	if(isset($_POST["E2Integrante3"])){
		$E2Integrante3 = $_POST["E2Integrante3"];
	}

	$E3Integrante1 = "";
	if(isset($_POST["E3Integrante1"])){
		$E3Integrante1 = $_POST["E3Integrante1"];
	}

	$E3Integrante2 = "";
	if(isset($_POST["E3Integrante2"])){
		$E3Integrante2 = $_POST["E3Integrante2"];
	}

	$E3Integrante3 = "";
	if(isset($_POST["E3Integrante3"])){
		$E3Integrante3 = $_POST["E3Integrante3"];
	}

	$E4Integrante1 = "";
	if(isset($_POST["E4Integrante1"])){
		$E4Integrante1 = $_POST["E4Integrante1"];
	}

	$E4Integrante2 = "";
	if(isset($_POST["E4Integrante2"])){
		$E4Integrante2 = $_POST["E4Integrante2"];
	}

	$E4Integrante3 = "";
	if(isset($_POST["E4Integrante3"])){
		$E4Integrante3 = $_POST["E4Integrante3"];
	}

	$E5Integrante1 = "";
	if(isset($_POST["E5Integrante1"])){
		$E5Integrante1 = $_POST["E5Integrante1"];
	}

	$E5Integrante2 = "";
	if(isset($_POST["E5Integrante2"])){
		$E5Integrante2 = $_POST["E5Integrante2"];
	}

	$E5Integrante3 = "";
	if(isset($_POST["E5Integrante3"])){
		$E5Integrante3 = $_POST["E5Integrante3"];
	}
	$rows = array();
	
	// include(APPLICATION."/libs/db/pdo.php");

	// Instanciamos la clase
	$DB = new libs_db_pdo();
	if($Asesores[0] != ""){
		
		$items = array();		
		$query3 = "CALL sp_Mat_CapturaAsesores(?,?,?,?)";
		$x=1;
		foreach ($Asesores as $A) {	
			if($A != ""){
				$params = array($x,$Escuela,$A,$Mail);	
				$DB->actualizar($query3,$params);
				$x++;
			}
			
		}
				
	}

	$query = "CALL sp_Mat_InsertaEquipo(?,?,?,?,?)";
	//insertar equipo 1
	if($E1Integrante1 != "" || $E1Integrante2 != "" || $E1Integrante3 != ""){
		//Sacar número de equipo
		
		$items = array();
		$Id_Eq = 0;
		$query2 = "CALL sp_Mat_numEq(?,?,@Id_Eq)";
		$params = array(1,$Escuela);	
		$DB->actualizar($query2,$params);	
		$items= $DB->seleccionar("SELECT @Id_Eq",$params);
		$Id_Eq = $items[0]['@Id_Eq'];

	    $params = array($Id_Eq,$Escuela,$E1Integrante1,$E1Integrante2, $E1Integrante3);		
		// Ejecutamos el query
		$total = $DB->actualizar($query,$params);	
			
	}
	//insertar equipo 2
	if($E2Integrante1 != "" || $E2Integrante2 != "" || $E2Integrante3 != ""){		
	
		$items = array();
		$Id_Eq = 0;
		$query2 = "CALL sp_Mat_numEq(?,?,@Id_Eq2)";
		$params = array(2,$Escuela);	
		$DB->actualizar($query2,$params);	
		$items= $DB->seleccionar("SELECT @Id_Eq2",$params);
		$Id_Eq = $items[0]['@Id_Eq2'];

	    $params = array($Id_Eq,$Escuela,$E2Integrante1,$E2Integrante2,$E2Integrante3);
		$total = $DB->actualizar($query,$params);
	}
	//insertar equipo 3
	if($E3Integrante1 != "" || $E3Integrante2 != "" || $E3Integrante3 != ""){
	
		$items = array();
		$Id_Eq = 0;
		$query2 = "CALL sp_Mat_numEq(?,?,@Id_Eq3)";
		$params = array(3,$Escuela);	
		$DB->actualizar($query2,$params);	
		$items= $DB->seleccionar("SELECT @Id_Eq3",$params);
		$Id_Eq = $items[0]['@Id_Eq3'];

	    $params = array($Id_Eq,$Escuela,$E3Integrante1,$E3Integrante2,$E3Integrante3);
		$total = $DB->actualizar($query,$params);
		
	}
	if($E4Integrante1 != "" || $E4Integrante2 != "" || $E4Integrante3 != ""){
	
		$items = array();
		$Id_Eq = 0;
		$query2 = "CALL sp_Mat_numEq(?,?,@Id_Eq4)";
		$params = array(4,$Escuela);	
		$DB->actualizar($query2,$params);	
		$items= $DB->seleccionar("SELECT @Id_Eq4",$params);
		$Id_Eq = $items[0]['@Id_Eq4'];

	    $params = array($Id_Eq,$Escuela,$E3Integrante1,$E3Integrante2,$E3Integrante3);
		$total = $DB->actualizar($query,$params);
		
	}
	if($E5Integrante1 != "" || $E5Integrante2 != "" || $E5Integrante3 != ""){
	
		$items = array();
		$Id_Eq = 0;
		$query2 = "CALL sp_Mat_numEq(?,?,@Id_Eq5)";
		$params = array(5,$Escuela);	
		$DB->actualizar($query2,$params);	
		$items= $DB->seleccionar("SELECT @Id_Eq5",$params);
		$Id_Eq = $items[0]['@Id_Eq5'];

	    $params = array($Id_Eq,$Escuela,$E3Integrante1,$E3Integrante2,$E3Integrante3);
		$total = $DB->actualizar($query,$params);
		
	}
	if(count($total)>0){
		$params = array($Escuela);
		$items= $DB->seleccionar("SELECT * FROM equipos WHERE idEscuela = ?",$params);
		//Mensaje a enviar
		
		$headers = "From: concursomatematicasuniva@univa.mx\r\n";
		$headers .= "Reply-To: concursomatematicasuniva@univa.mx\r\n";		
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$mensaje='<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title>Información de registro para el concurso de matemáticas nivel bachillerato</title>
			</head>
			<body>
			<h1>La información registrada es la siguiente:</h1>
			<h2>Asesor(es): </h2>';			
			
			foreach ($Asesores as $A) {
				$mensaje .= '<p>'.$A.'</p>';
			
			}
			for($i=0;$i < count($items);$i++){
				$mensaje .='<table style="margin-top: 10px; border: 1px solid black;">
						<tr style="border: 1px solid black;" >
							<th style="border: 1px solid black;">Equipo</th>
							<th style="border: 1px solid black;">Integrantes</th>
							<th style="border: 1px solid black;">Usuario</th>
							<th style="border: 1px solid black;">Contraseña</th>
						</tr>
						<tr>
							<td rowspan="3" style="border: 1px solid black;">'.$items[$i]['idEquipo'].'</td>
							<td style="border: 1px solid black;">'.$items[$i]['Integrante1'].'</td>
							<td rowspan="3" style="border: 1px solid black;">'.$items[$i]['Usuario'].'</td>
							<td rowspan="3" style="border: 1px solid black;">'.$items[$i]['Contrasena'].'</td>
						</tr>						
						<tr>
							<td style="border: 1px solid black;">'.$items[$i]['Integrante2'].'</td>
						</tr>
						<tr>
							<td style="border: 1px solid black;">'.$items[$i]['Integrante3'].'</td>
						</tr>
						
						
					</table>';
			}
		$mensaje .='<p>para realizar cambios a la información registrada</p>
					<p>utilice la siguiente contraseña: '.$items[0]['Modificar'].'</p>
			</body>
		</html>';
		//------------------------------mail($para,$titulo,$mensaje,$headers);
		//$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
		//$mail->IsSMTP(); // telling the class to use SMTP
		
			/*
			//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Host       = "smtp.univa.mx"; // sets the SMTP server
			$mail->SMTPSecure = "ssl";
			$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
			$mail->Username   = "concurso.matematicas@univa.mx"; // SMTP account username
			$mail->Password   = "M4t3m4t1c4s";        // SMTP account password
			$mail->AddReplyTo("concurso.matematicas@univa.mx");
			$mail->AddAddress($para);
			$mail->SetFrom("concurso.matematicas@univa.mx");
			
			$mail->Subject = $titulo;
			$mail->IsHTML(true);
			$mail->Body=$mensaje;
			$mail->Send();
			*/
			
			/*	
			try{
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'mx1.hostinger.mx';                       // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username   = "concursomatematicasuniva@mate.frostbyte.esy.es";
			$mail->Password   = "M4t3m4t1c4s";             // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			$mail->Port = 2525;                                    //Set the SMTP port number - 587 for authenticated TLS
			$mail->setFrom('concursomatematicasuniva@mate.frostbyte.esy.es', 'Amit Agarwal');     //Set who the message is to be sent from
			$mail->addReplyTo('concursomatematicasuniva@mate.frostbyte.esy.es', 'First Last');  //Set an alternative reply-to address
			  // Add a recipient
			$mail->addAddress($para);    
			
			
			$mail->isHTML(true);                                  // Set email format to HTML
			 
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			 
			
			if(!$mail->send()) {
			   echo 'Message could not be sent.';
			   echo 'Mailer Error: ' . $mail->ErrorInfo;
			   exit;
			}
			 
			echo 'Message has been sent';
		}
		catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
			echo $e->getMessage(); //Boring error messages from anything else!
		}

		*/
	}
	// Destruimos el objeto
	$DB = null;
	
	// echo "<pre>Total"; print_r($total); echo "</pre>";
	// echo "<pre>Rows"; print_r($rows); echo "</pre>";
}	
?>
