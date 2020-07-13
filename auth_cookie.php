<?php
if (isset($_COOKIE['user']))
{
	// Заносим кук в переменную
    $str = $_COOKIE["user"];
  
    // Вся длина строки
    $all_len = strlen($str);

    // Длина логина
    $login_len = strpos($str,'+');
	
    // Обрезаем строку до Плюса и получаем Логин
    $login = substr($str,0,$login_len);
  
    // Получаем пароль 
    $pass = substr($str,$login_len+1,$all_len);

	// Загружаем бд
    $xml = simplexml_load_file("db/users.xml");
	
	// Заносим данные из бд в сессию
	foreach($xml as $user){
		if($user->login == $login  && $user->pass == $pass){	 	
			session_start();	 
			$_SESSION['auth'] = 'yes_auth'; 
			$_SESSION['auth_login'] = $login;
			$_SESSION['auth_pass'] = $pass;
			$_SESSION['auth_email'] = (string)$user->email;
			$_SESSION['auth_name'] = (string)$user->name;
		}
	} 
}
?>