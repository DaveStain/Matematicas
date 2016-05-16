
<?php
if(isset($_GET["user"]) && isset($_GET["pass"])){

  $DB = new libs_db_pdo();
    $user =  $_GET["user"];
    $pass =  $_GET["pass"];
    $params = array($user,$pass);
    $query = "SELECT Usuario, Contrasena FROM equipos WHERE Usuario = ? AND Contrasena = ?";
    $result = $DB->seleccionar($query,$params); 
        
    if(!empty($result[0]['Usuario']))
    {     
        session_start();
        $_SESSION['usuario']=$result[0]['Usuario']; //Storing user session value.
       echo $result[0]['Usuario'];
    }else{
        echo "error";
    }
    $DB = NULL;
}
?>