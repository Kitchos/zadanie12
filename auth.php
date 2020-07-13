<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{  
	$auth_login = '';
	$auth_pass = '';
	$auth = '';
	$autorization = true;
	// Шифруем пароль
	$pass = 'соль'.md5($_POST['auth_pass']);
	// Загружаим бд
    $xml = simplexml_load_file("db/users.xml");
	
	// Проверяем логин на корректность ввода
	if(!preg_match('/^[0-9a-z]+$/i',$_POST['auth_login'])){
		$auth_login = 'Логин должен содержать только цифры и буквы!<br>';
		$autorization = false;
	}

	// Проверяем пароль на корректность ввода
	if(!preg_match('/^[0-9a-z]+$/i',$_POST['auth_pass'])){
		$auth_pass = 'Пароль не соответствует!<br>';
		$autorization = false;
	}

	// Если все корректно вносим кук на минуту и создаем сессию
	if($autorization == true){
		foreach($xml as $user){
			if($user->login == $_POST['auth_login']  && $user->pass == $pass){
				$auth = 'true';	
				setcookie('user',$_POST['auth_login'].'+'.$pass,time()+360, "/");
				session_start();
				$_SESSION['auth'] = 'yes_auth'; 
				$_SESSION['auth_login'] = $_POST['auth_login'];
				$_SESSION['auth_pass'] = $pass;
				$_SESSION['auth_email'] = (string)$user->email;
				$_SESSION['auth_name'] = (string)$user->name;
				break;
			}
			else{
				$auth = 'Неправильный логин или пароль!<br>';	
			}
		} 
	}
	
	// Отправляем ответ
	echo json_encode(array ( "1" => $auth_login, "2" => $auth_pass, "3" => $auth));
} 
?>