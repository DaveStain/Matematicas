<?php
    include("../application/config/config.php");
    include("../application/config/autoload.php");
    include("../application/html/global/html-ini.php");
    include("../application/lang/es.php");
    include("../application/libs/db/pdo.php");
    //include("../application/libs/utilerias/class.phpmailer.php");
    //include("../application/libs/utilerias/class.smtp.php");

?>
    <!-- Inicio - Área de Contenido -->
    <?php
        //echo "<pre>"; print_r($_GET); echo "</pre>";

        // Especificamos el nombre del archivo a abrir por default
        $op = "inicio";
        
        // Validamos si se solicita un archivo en específico para abrir
        if(isset($_GET["op"]) and $_GET["op"]!=""){
            $op = addslashes($_GET["op"]); // escapar los caracteres especiales "", ''
        }elseif(isset($_POST["op"]) and $_POST["op"]!=""){
            $op = addslashes($_POST["op"]); // escapar los caracteres especiales "", ''
        }
        
        // Validamos la ruta para la apertura del archivo
        $file = realpath("../application/html/public/".$op.".php");

        // Validamos si existe el archivo para incluirlo 
        if($file!= false and file_exists($file)){
            include($file);
        }else{
            echo "El archivo solicitado no existe<br>";
        }
        
        //echo "<pre>"; print_r($_SERVER); echo "</pre>";
    ?>
    <!-- Fin - Área de Contenido -->
<?php
    include("../application/html/global/html-fin.php");
?>