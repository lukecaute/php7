<?php
class Sql extends PDO{

	private $conn; // Essa váriavel guardará a conexão com o banco

	public function __construct(){//Essa função fará com que a conexão (conn) seja criada assim que o objeto for instanciado

		$this->conn = new PDO("mysql:host=127.0.0.1;dbname=php7","root","");
	}

	/*
	Essa função vai servir para setar n parâmetros na statement
	*/
	private function setParams($statment, $parameters = array()){

		foreach($parameters as $key => $value){
			$this->setParam($key, $value);
		}
	}

	/*
	Essa função vai setar um parâmetro na statement
	*/
	private function setParam($statement, $key, $value){

		$statmet->bindParam($key, $value);
	}
	/*
	Essa função query vai receber a query 'bruta' (que ainda será editada) e os parâmetros (em um array) para com isso sintetizar a query que será executada no banco.
	*/
	public function query($rawQuery, $params = array()){

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;
	}

	public function select($rawQuery, $params = array()):array{

		$stmt = $this->query($rawQuery, $params);
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>