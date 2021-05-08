<?php
require_once './Model/CapthaModel.php';
require_once './Core/Model.php';
class VerifyModel
{
	protected $updated_data = [
		"Num"=>'',
		"Email"=>'',
		"Password"=>'',
		"ConfirmPassword"=>'',
		"FIO"=>'',
		"PhoneNumber"=>'',
		"Adress"=>'',
		"NumberAppartment"=>'',
		"captcha"=>''
	];
	public function VerifyRegistrationForm($method,$captcha_code, $data)
	{
		if ($method == "POST") 
		{
			$captcha_object = new CapthaModel();
			$num = $this->test_input($data["Num"]);
			$email = $this->test_input($data["Email"]);
			$pass = $this->test_input($data["Password"]);
			$confirmPass = $this->test_input($data["ConfirmPassword"]);
			$fio = $this->test_input($data["FIO"]);
			$phone = $this->test_input($data["PhoneNumber"]);
			$adress = $this->test_input($data["Adress"]);
			$numberAppartment = $this->test_input($data["NumberAppartment"]);
			$captcha = $this->test_input($data["captcha"]);
			$validate_phone = $this->ValidPhoneNumber($phone);
			$result = array('result'=>'OK','fio'=>'','adress'=>'','numberAppartment'=>'','num'=>'','pass'=>'', 'samepass'=>'', 'email'=>'', 'phone'=>'', 'captcha'=>'');
			
			if(strlen($fio) == 0){
				$result["result"] = 'NOK';
				$result["fio"] = 'ФИО обязательно должен быть заполнен';
			}
			if(strlen($adress) == 0){
				$result["result"] = 'NOK';
				$result["adress"] = 'ФИО обязательно должен быть заполнен';
			}
			if(strlen($numberAppartment) == 0){
				$result["result"] = 'NOK';
				$result["numberAppartment"] = 'ФИО обязательно должен быть заполнен';
			}
			if (ctype_digit($num) == false){
				$result["result"] = 'NOK';
				$result["num"] = 'Номер лицегого счета не может иметь буквы';
			}
			if(strlen($pass)< 8){
				$result["result"] = 'NOK';
				$result["pass"] = 'Password must be at least 8 symbols';
			}
			if($pass !== $confirmPass){
				$result["result"] = 'NOK';
				$result["samepass"] = 'Password not equal ConfirmPassword';
			}
			if (filter_var($email, FILTER_VALIDATE_EMAIL)== false){
				$result["result"] = 'NOK';
				$result["email"] = 'Email is not valid';
			}
			if ($validate_phone == ""){
				$result["result"] = 'NOK';
				$result["phone"] = 'Phone number is not valid';
			}
			if($captcha_object->verify($captcha_code, $captcha) !== true){
				$result["result"] = 'NOK';
				$result["captcha"] = 'Numbers are incorrect';
			}
			
			$this->updated_data = [
				"Num"=>$num,
				"Email"=>$email,
				"Password"=>$pass,
				"ConfirmPassword"=>$confirmPass,
				"FIO"=>$fio,
				"PhoneNumber"=>$phone,
				"Adress"=>$adress,
				"NumberAppartment"=>$numberAppartment,
				"captcha"=>$captcha
			];
			
			return $result;
		}
	}
	public function GetValidData()
	{
		return $this->updated_data;
	}
	protected function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	protected function ValidPhoneNumber($data)
	{
		$justNums = preg_replace("/[^0-9]/", '', $data);
		if(strlen($justNums)==10 or strlen($justNums)==12)
		{
			return $justNums;
		}
		
		return "";
	}
	
	
}
?>