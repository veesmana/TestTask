<div class="contatiner">
<h1 id="regestrationHeader">Регистрация на сайте</h1>
<div class="row">
	<form method="Post" action="verify" >
	<div class="row inputline">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 nameofinput">
			<p>Имя пользователя *:<br>(номер лицеого счета)
			</p>
		</div>
		<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 inputdiv">
			<input required type="text" required Name="Num" id="confirmpass" />
			<?php 
				if($_SESSION['numError']!==""){
					echo '<span class="textUnderInput">'.$_SESSION['numError'].'</span>';
					$_SESSION['numError']='';
				}
				else{
					echo'<span class="textUnderInput">номер лицевого счета см. на квитанции</span>';
				}
			?>
		</div>
	</div>
	<div class="row inputline">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 nameofinput">
			<p>Пароль *:
			</p>
		</div>
		<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 inputdiv">
			<input required type="text" required Name="Password" id="pass" />
			<?php 
				if($_SESSION['passError']!==""){
					echo '<span class="textUnderInput">'.$_SESSION["passError"].'</span>';
					$_SESSION['passError'] ='';
				}
				else{
					echo'<span class="textUnderInput"></span>';
				}
			?>
		</div>
	</div>
	<div class="row inputline">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 nameofinput">
			<p>Подтверждение *:<br>
			</p>
		</div>
		<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 inputdiv">
			<input required type="text" required Name="ConfirmPassword" id="confirmpass" />
			<?php 
				if($_SESSION['samepassError']!==""){
					echo '<span class="textUnderInput">'.$_SESSION['samepassError'].'</span>';
					$_SESSION['samepassError']='';
				}
				else{
					echo'<span class="textUnderInput"></span>';
				}
			?>
		</div>
	</div>
	<div class="row inputline">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 nameofinput">
			<p>ФИО *:<br>
			</p>
		</div>
		<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 inputdiv">
			<input required type="text" required Name="FIO" id="fio" />
			<?php 
				if($_SESSION['fioError']!==""){
					echo '<span class="textUnderInput">'.$_SESSION['fioError'].'</span>';
					$_SESSION['fioError']='';
				}
				else{
					echo'<span class="textUnderInput"></span>';
				}
			?>
		</div>
	</div>
	<div class="row inputline">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 nameofinput">
			<p>Электронная почта *:<br>
			</p>
		</div>
		<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 inputdiv">
			<input required type="text" required Name="Email" id="email"/>
			<?php 
				if($_SESSION['emailError']!==""){
					echo '<span class="textUnderInput">'.$_SESSION['emailError'].'</span>';
					$_SESSION['emailError'] = '';
				}
				else{
					echo'<span class="textUnderInput"></span>';
				}
			?>
		</div>
	</div>
	<div class="row inputline">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 nameofinput">
			<p>Телефон *:<br>
			</p>
		</div>
		<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 inputdiv">
			<input required type="text" required Name="PhoneNumber" id="phonenumber"/>
			<?php 
				if($_SESSION['phoneError']!==""){
					echo '<span class="textUnderInput">'.$_SESSION['phoneError'].'</span>';
					$_SESSION['phoneError'] ='';
				}
				else{
					echo'<span class="textUnderInput"></span>';
				}
			?>
		</div>
	</div>
	<div class="row inputline">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 nameofinput">
			<p>Адрес *:<br>
			</p>
		</div>
		<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 inputdiv">
			<input required type="text" required Name="Adress" id="adress"/>
			<?php 
				if($_SESSION['adressError']!==""){
					echo '<span class="textUnderInput">'.$_SESSION['adressError'].'</span>';
					$_SESSION['adressError']='';
				}
				else{
					echo'<span class="textUnderInput"></span>';
				}
			?>
		</div>
	</div>
	<div class="row inputline">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 nameofinput">
			<p>Номер квартиры *:<br>
			</p>
		</div>
		<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 inputdiv">
			<input required type="text" required Name="NumberAppartment" id="numbapp"/>
			<?php 
				if($_SESSION['numberAppartmentError']!==""){
					echo '<span class="textUnderInput">'.$_SESSION['numberAppartmentError'].'</span>';
					$_SESSION['numberAppartmentError']='';
				}
				else{
					echo'<span class="textUnderInput"></span>';
				}
			?>
		</div>
	</div>
	<div class="row inputline">
	  <!--Блок для ввода кода CAPTCHA-->
	  <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 nameofinput"></div>
	  <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 inputdiv">
        <img id="img-captcha" src="/capcha2" >		
	  </div>
	</div>
	<div class="row inputline">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 nameofinput">
			<p>Цифра с картинки *:<br>
			</p>
		</div>
		<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 inputdiv">
			<input required type="text" required Name="CAPTCHA" id="captcha" />
			<?php 
				if($_SESSION['captchaError']!==""){
					echo '<span class="textUnderInput">'.$_SESSION['captchaError'].'</span>';
					$_SESSION['captchaError']='';
				}
				else{
					echo'<span class="textUnderInput"></span>';
				}
			?>
		</div>
	</div>
	<div class="row inputline">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 nameofinput"></div>
		<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 inputdiv">
		<p id="comment">
			(Примечание: Если вы не можете прочитать цифру на <br>картинке,<br>
			перезагрузите страницу, чтобы получить новую картинкую.)<br>
			*- отмеченные поля, обязательные для заполнения
		</p>
		</div>
	</div>
	<input id="RegistrationButton" type="submit" value="Зарегистрироваться" />
	</form>
</div>
</div>

