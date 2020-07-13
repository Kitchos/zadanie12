<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	$reg_login = '';
	$reg_pass = '';
	$reg_pass_confirm = '';
	$reg_pass_equal = '';
	$reg_email='';
	$reg_name='';
	$reg='';
	$registration = true;
	// Шифруем пароль
	$pass = 'соль'.md5($_POST["reg_pass"]);
	// Загружаим бд
	$xml = simplexml_load_file("db/users.xml");
	
	// Проверяем логин если не соответствует проверяем на корректность заполнения и сущевствование в бд
	if(!preg_match('/^[0-9a-z]+$/i',$_POST['reg_login'])){
		$reg_login = 'Логин должен содержать только цифры и буквы!<br>';
		$registration = false;
	}else{
		foreach($xml as $user){
			if($user->login == $_POST['reg_login']){
				$reg_login = 'Такой логин уже существует!<br>';
				$registration = false;
			}
		}
	}
	
	// Проверяем пароль на правильность
	if(!preg_match('/^[0-9a-z]+$/i',$_POST['reg_pass'])){
		$reg_pass = 'Пароль должен содержать только цифры и буквы!<br>';
		$registration = false;
	}
	
	// Проверяем подтверждение пароля на пустоту
	if($_POST['reg_pass_confirm'] == ''){
		$reg_pass_confirm = 'Подтверждение пароля не можеть быть пустым!<br>';
		$registration = false;
	}
	
	// Проверяем раны ли поля пароль и подтверждение пароля
	if($_POST['reg_pass'] != $_POST['reg_pass_confirm']){
		$reg_pass_equal = 'Пароль и подтверждение пароля не соответствуют!<br>';
		$registration = false;
	}
	
	// Проверяем логин если не пустое проверяем на сущевствование в бд
	if(!preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/',$_POST['reg_email'])){
		$reg_email = 'Email не можеть быть пустым!<br>';
		$registration = false;
	}else{
		foreach($xml as $user){
			if($user->email == $_POST['reg_email']){
				$reg_email = 'Email введен не корректно!<br>';
				$registration = false;
			}
		}
	}
	
	// Проверяем имя на правильность
	if(!preg_match('/^[a-zа-я]+$/ui',$_POST['reg_name'])){
		$reg_name = 'Имя должено содержать только буквы!<br>';
		$registration = false;
	}
	
	// Если все впорядке заносим запись в бд
	if($registration == true){
		$element = $xml->addChild('user');
		$element->addChild('login',$_POST["reg_login"]);
		$element->addChild('pass',$pass);
		$element->addChild('email',$_POST["reg_email"]);
		$element->addChild('name',$_POST["reg_name"]);
		file_put_contents("db/users.xml",$xml->asXML());
		$reg = 'true';
	}		

	// Отправляем ответ
	echo json_encode(array ( "1" => $reg_login, "2" => $reg_pass, "3" => $reg_pass_confirm, "4" => $reg_pass_equal, "5" => $reg_email, "6" => $reg_name, "7" => $reg));	
}
?>