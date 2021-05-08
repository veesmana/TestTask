<?php
require_once './view/MainView.php';
require_once './Model/VerifyModel.php';
require_once './Model/RegisterModel.php';
require_once './Core/Controller.php';
class MainController extends Controller
{
	function __construct()
	{
		//require_once './view/View.php';
		$this->view = new MainView();
		//print "<h1>Hi I am Controller</h1>";
	}
	public function CallForm1()
	{
		return new Form1();
	}
	
	public function CallForm2()
	{
		//require_once './Logic/Form2.php';
		return new Form2();
	}
	
	public function action_index()
	{	
		//$image = $captcha->GenerateNumCaptcha();
		$this->view->generate('form.php', 'public.php');
	}
	
	public function ValidateForm()
	{
		$model = new RegisterModel();
		$formChecker = new VerifyModel();
		$method = $_SERVER["REQUEST_METHOD"];
		$captcha_code = $_SESSION["code"];
		$data = [
			"Num"=>$_POST["Num"],
			"Email"=>$_POST["Email"],
			"Password"=>$_POST["Password"],
			"ConfirmPassword"=>$_POST["ConfirmPassword"],
			"FIO"=>$_POST["FIO"],
			"PhoneNumber"=>$_POST["PhoneNumber"],
			"Adress"=>$_POST["Adress"],
			"NumberAppartment"=>$_POST["NumberAppartment"],
			"captcha"=>$_POST["CAPTCHA"]
		];
		
		$result = $formChecker->VerifyRegistrationForm($method,$captcha_code, $data);
		$this->setSessionError($result);
		
		if($result["result"] == "OK")
		{
			$updateddata = $formChecker->GetValidData();
			$model->Create_data($updateddata);
		}
		//echo ("<pre>"); var_dump($data);
		//echo ("<pre>"); var_dump($result);
		header('Location: form1');
		exit();
		
	}
	public function GenerateNumCaptcha()
	{
		//require_once './Model/CapthaModel.php';
		$captcha = new CapthaModel();
		$captcha->GenerateNumCaptcha();
		$_SESSION["code"]= $captcha->getCode();
		
	}
	
	private function setSessionError($result)
	{
		if ($result["result"] == "NOK"){
			if ($result["num"]!== ""){
				$_SESSION['numError'] = $result["num"];
			}
			if ($result["pass"]!== ""){
				$_SESSION['passError'] = $result["pass"];
			}
			if ($result["samepass"]!== ""){
				$_SESSION['samepassError'] = $result["samepass"];
			}
			if ($result["num"]!== ""){
				$_SESSION['emailError'] = $result["email"];
			}
			if ($result["phone"]!== ""){
				$_SESSION['phoneError'] = $result["phone"];
			}
			if ($result["captcha"]!== ""){
				$_SESSION['captchaError'] = $result["captcha"];
			}
			if ($result["fio"]!== ""){
				$_SESSION['fioError'] = $result["fio"];
			}
			if ($result["adress"]!== ""){
				$_SESSION['adressError'] = $result["adress"];
			}
			if ($result["numberAppartment"]!== ""){
				$_SESSION['numberAppartmentError'] = $result["numberAppartment"];
			}
		}
	}
	
}




?>