<?php
require_once './Core/Model.php';
class RegisterModel extends Model
{
	public function Create_data($data)
	{
		
		if ($this->Check_data($data) == false){
			return false;
		}
		$this->Create_Connection();
		if($this->conn_status == false){
			return false;
		}
		try{
			$sth = $this->conn->prepare('INSERT INTO register.users 
				(Num, Password, Adress, NumOfApartment, Phone, FIO, Email) 
				VALUES(:Num,:Password,:Adress,:NumOfApartment, :Phone, :FIO, :Email);');
				
			$hash = password_hash($data["Password"], PASSWORD_DEFAULT);
			$sth->bindValue(':Num', $data["Num"], PDO::PARAM_STR);
			$sth->bindValue(':Password', $hash, PDO::PARAM_STR);		
			$sth->bindValue(':Adress', $data["Adress"], PDO::PARAM_STR);
			$sth->bindValue(':NumOfApartment', $data["NumberAppartment"], PDO::PARAM_STR);	
			$sth->bindValue(':Phone', $data["PhoneNumber"], PDO::PARAM_STR);
			$sth->bindValue(':FIO', $data["FIO"], PDO::PARAM_STR);	
			$sth->bindValue(':Email', $data["Email"], PDO::PARAM_STR);
		
			$sth->execute();
			$this->Close_Connection();
			
			return true;
		}
		catch(Exception $e) {
			return false;
		}
	}
	public function Check_data($data)
	{
		
		$this->Create_Connection();
		
		if($this->conn_status == false){
			return false;
		}
		
		try{
			$sth = $this->conn->prepare('SELECT * FROM register.users WHERE Num = :Num;');
			$sth->bindValue(':Num', $data["Num"], PDO::PARAM_STR);
			$sth->execute();
			if($sth->rowCount() > 0){
				return false;
			}
			$this->Close_Connection();
			return true;
		}
		catch(Exception $e){
			return false;
		}
	}
}
?>