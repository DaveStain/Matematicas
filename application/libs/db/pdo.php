<?php
class libs_db_pdo{
	/* Atributos */
	private $pdo; // Referencia de conexión

	/* Constructor */
	function __construct(){
		try {
			/* Instanciamos el objeto */
		    $this->pdo  = new PDO(DNS, DB_USER, DB_PASS);
		    /* Especificamos la codificación de caracteres a utilizar */
		    $this->pdo->exec("SET CHARACTER SET ".CHARSET);
		    /* Asignamos los parámetros para el manejo de errores y excepciones */
		    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }catch (PDOException $ex) {
	  		echo 'ERROR: ' . $ex->getMessage();
		}
	}

	/**
	* Permite ejecutar instrucciones "INSERT, DELETE Y UPDATE"
	*/
	function actualizar($query, $params = array()){
		$total = 0;
		try {
	      	/* Asignamos la consulta a ejecutarse */
		    $stm = $this->pdo->prepare($query);
		    /* Asignamos los parámetros que recibirá la consulta */
		    $stm->execute($params);
		    /* Total de registros afectados */
		    $total = $stm->rowCount();

		}catch (PDOException $ex) {
		  	 echo 'ERROR: ' . $ex->getMessage();
		}

		return $total;
	}

	/**
	* Permite ejecutar instrucciones "SELECT"
	*/
	function seleccionar($query, $params = array()){
		$rows = array();
		try {
	      	/* Asignamos la consulta a ejecutarse */
		    $stm = $this->pdo->prepare($query);
		    /* Asignamos los parámetros que recibirá la consulta */
		    $stm->execute($params);
		    /* Obtenemos el resultado de la consulta */
	    	 $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

		}catch (PDOException $ex) {
		  	 echo 'ERROR: ' . $ex->getMessage();
		}

		return $rows;
	}

	/* Destructor */
	function __destruct(){
		/* Cerramos la conexión */
		$this->pdo = null;
	}
}
?>