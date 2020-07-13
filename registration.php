<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html";charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
    <title>Регистрация</title>
</head>
<body>

<div id="block-registration">

<h2 class="h2-title">Регистрация</h2>
<form method="post" id="form_reg" >
<!--Блок вывода ошибок-->
<div class ="error-box">
</div>

<ul id="form-registration">

<li>
<label>login</label>
<input type="text" name="reg_login" id="reg_login" />
</li>

<li>
<label>password</label>
<input type="text" name="reg_pass" id="reg_pass" />
</li>

<li>
<label>confirm_password</label>
<input type="text" name="reg_pass_confirm" id="reg_pass_confirm" />
</li>

<li>
<label>email</label>
<input type="text" name="reg_email" id="reg_email" />
</li>

<li>
<label>name</label>
<input type="text" name="reg_name" id="reg_name" />
</li>

</ul>

<p align="right"> <button type="button" id="submit" >Регистрация</button>
<noscript>
<span>У вас отключен JS.<span>
</noscript>
</p>
</form>

</div>

</body>
</html>