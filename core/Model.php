<?php
class Model
{
	protected $conn;
	protected $conn_status;
	public function Create_data($data)
	{
	}
	public function Create_Connection()
	{
		try{
			$this->conn = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, 
				DB_USER, 
				DB_PASSWORD, 
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
			);
			$this->conn_status = true;
		}
		catch(PDOException $e){
			$this->conn_status = false;
		}
	}
	public function Check_connection()
	{
		return $this->conn_status;
	}
	public function Close_Connection()
	{
		$this->conn = null;
	}
	
}	
?>