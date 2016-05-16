
<?php 
 $DB = new libs_db_pdo();
 if(isset($_GET["id"])){	
	
	$esc = $_GET["id"];
    $params = array($esc);
	$reg = array();
	$query = "CALL sp_Mat_InfoEquipos(?)";
	$reg = $DB->seleccionar($query,$params);
	print json_encode($reg);
	
}
else if(isset($_GET["pass"])){
    
    $esc = $_GET["pass"];
    $reg = array();
    $params = array($esc);
    $query = "SELECT Modificar FROM equipos WHERE Modificar = ?";
    $reg = $DB->seleccionar($query,$params);
    print json_encode($reg);
}
else if(isset($_GET["equipo"])){
    
    $eq = $_GET["equipo"];
    $params = array($eq);
    $reg = array();
    $query = "SELECT * FROM preguntas WHERE idEquipo = ?";
    $reg = $DB->seleccionar($query,$params);
    print json_encode($reg);
    

    
}
else if(isset($_GET["detalle"])){
    $op = $_GET["detalle"];
    $det = 0;
    $msj = "";
    switch($op){
        case "iniCon":  $det = 1; 
                        $msj = "El concurso ha dado inicio"; 
                        break;
        case "cierCon": $det = 2; 
                        $msj = "El concurso se ha cerrado";
                        break;
        case "Abrir":   $det = 3;
                        $msj = "Las inscripciones han iniciado";
                        break;
        case "Cerrar":  $det = 4;
                        $msj = "Inscripciones cerradas";
                        break;
        default:        $msj="error";break;

    }
    $params = array($det);
    $reg = array();
    $query = "CALL sp_Mat_Detalles(?)";
    $DB->actualizar($query,$params);
    print json_encode($msj);
}   
    $DB = null;
?>