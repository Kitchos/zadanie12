<?php
 //  session_start();
   include("auth_cookie.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html";charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	
    <title>Главная</title>
</head>
<body>

<?php
if(isset($_SESSION['auth'])){
if ($_SESSION['auth'] == 'yes_auth')
{
 
 echo '<p id="authentication" align="left">Hello, '.$_SESSION['auth_name'].'!</p>';   
    
}else{
 
  echo '<p id="authentication" align="left"><a class="top-auth" href="autorization.php">Вход</a><a class="top" href="registration.php">Регистрация</a></p>';   
    
}
}else{
 
  echo '<p id="authentication" align="left"><a class="top-auth"  href="autorization.php">Вход</a><a class="top" href="registration.php">Регистрация</a></p>';   
    
}
 ?>
 
</body>
</html>