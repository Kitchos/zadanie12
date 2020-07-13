$(document).ready(function() {
	//Если скрипт включен отображаем кнопку регистрации
	$('#submit').css('visibility','visible');
	
	//Если скрипт включен отображаем кнопку аторизации
	$('#autorization').css('visibility','visible');
	
	// При нажатии на кнопку регистрации отправляем запрос на сервер
	$('#submit').click(function(){    
        var reg_login = $("#reg_login").val();
        var reg_pass = $("#reg_pass").val();
        var reg_pass_confirm = $("#reg_pass_confirm").val();
        var reg_email = $("#reg_email").val();
        var reg_name = $("#reg_name").val();
		$(".error-box").empty();	
			
		$.ajax({ 
        type: "POST",
        url: " reg.php",
        data: "&reg_login="+reg_login+"&reg_pass="+reg_pass+"&reg_pass_confirm="+reg_pass_confirm+"&reg_email="+reg_email+"&reg_name="+reg_name,
		dataType: "html",
        success: function(data) {
			console.log(data);
			var dat = JSON.parse(data);
			for(var id in dat){
				// Если авторизация прошла успешны выдаем сообщение об успешной авторизации и перенаправляем
				// на главную форму через 2 секунды, если нет, выдаем сообщение о соответствующей ошибке.
				if(dat[id] == 'true'){
					$('.error-box').append('Успешная регистрация!<br>');
					setTimeout(function(){
					window.location.href = 'index.php';
					}, 2 * 1000);
				}else{
					$('.error-box').append(dat[id]);
				}
			}
		}
		})	     
    });
	
// При нажатии на кнопку авторизации отправляем запрос на сервер
$('#autorization').click(function(){

	var auth_login = $("#auth_login").val();
	var auth_pass = $("#auth_pass").val();
	$(".error-box").empty();
	

		$.ajax({ 
        type: "POST",
        url: " auth.php",
        data: "auth_login="+auth_login+"&auth_pass="+auth_pass,
		dataType: "html",
        success: function(data) {
			var dat = JSON.parse(data);
			for(var id in dat){
				// Если авторизация прошла успешны выдаем сообщение об успешной авторизации и перенаправляем
				// на главную форму через 2 секунды, если нет, выдаем сообщение о соответствующей ошибке.
				if(dat[id] == 'true'){
					$('.error-box').append('Успешная авторизация!<br>');
					setTimeout(function(){					
					window.location.href = 'index.php';
					}, 2 * 1000);
				}else{
					$('.error-box').append(dat[id]);
				}
			}
		}
		})
	
});
});