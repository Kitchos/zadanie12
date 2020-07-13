<?php

   session_start();
   //include("auth_cookie.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html";charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	
    <title>Авторизация</title>
</head>
<body>


<div id="block-autorization">

<h2 class="h2-title">Вход</h2>
<form method="post" id="form_auth" >
<div class ="error-box">
</div>

<ul id="form-autorization">

<li>
<label>login</label>
<input type="text" name="auth_login" id="auth_login" />
</li>

<li>
<label>password</label>
<input type="password" name="auth_pass" id="auth_pass" />
</li>

</ul>

<p align="right"> <button type="button" id="autorization" >Вход</button>
<noscript>
<span>У вас отключен JS.<span>
</noscript>
</p>
</form>



</div>

</body>
</html>