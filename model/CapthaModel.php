<?php 
class CapthaModel
{
	const  FULL_STRING = '1234567890';
	private $code="Nok";
	
	public function GenerateNumCaptcha()
	{
		$captchastring = substr(str_shuffle(self::FULL_STRING), 0,6);
		$this->code = $captchastring;
		
		$image = imagecreatefrompng('staticFile/img/backgroundCaptcha.png');
		$colour = imagecolorallocate($image, 190,190,190);
		$font = realpath('./staticFile/font/Mistral.ttf');
		$rotate = rand(-8, 8);
		 
		imagettftext($image, 50, $rotate, 32, 72, $colour, $font, $captchastring);
		header('Content-type: image/png');
		imagepng($image);	
	}
	public function getCode() 
	{
		return $this->code;
	}
	public function verify($captchafromSesia, $captchatext)
	{
		if ($captchafromSesia == $captchatext) {
			return true;
		} 
		else {
			return false;
		}
	}
}
?>