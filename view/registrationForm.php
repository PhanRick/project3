<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title> Registration Form</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<style type="text/css">
		body {background-color:#C0C0C0;}
	</style>
</head>
<body >
	<div class ="container">
		<h3> Registration Form </h3>
		<form  method="post" id= "registration_form" name ="registration_form" action="../index.php/?controller=user&action=register" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for= "username"> <strong>Username: </strong></label>
				<input type="text"  class="form-control"  id="username" name="username" maxlength="20">
			</div>

			<div class="form-group">
				<label for= "password"> <strong>Password: </strong></label>
				<input type="password"  class="form-control"  id="password" name="password" maxlength="20">
			</div>

			<div class="form-group"> 
				<label for= "confirm_password"> <strong>Password(confirmation): </strong></label>
				<input type="password"  class="form-control"  id= "confirm_password" name="confirm_password" maxlength="50">
			</div>


			<div class="form-group"> 
				<label for= "email"> <strong>E-mail: </strong></label>
				<input type="email"   class="form-control"  id= "email" name="email" maxlength="50">
			</div>

			<div class="form-group">
				<label for="avatar"><strong>Avatar:</strong></label>
				<input type="file"  class="form-control"  name="avatar" id="avatar">
			</div>


			<input class="btn btn-primary float:right" type="reset" name="reset" value="Reset form"> 



			<input class="btn btn-success float:right"  type="submit" name="subscribe" value="Subscribe">


		</form>
	</div>
	<script>
		$(function(){
			$("#registration_form").submit(function(e){
				var validated = true,
				username = $("input[name='username']"),
				password = $("input[name='password']"),
				cPassword = $("input[name='confirm_password']"),
				email = $("input[name='email']");
				$(this).find(".error").remove();

				if((username).val().length < 2){
					validated = false;
					username.css("border-color", "red");
					username.parent().append("<span class='error' style='color:red'>Your username cannot be less than 2 characters</span>");
					$(".error").fadeIn(500);
				}else{
					username.css("border-color", "green");
					username.parent().find(".error").remove();
				}

				if( password.val().length < 5){
					validated = false;
					password.css("border-color", "red");
					password.parent().append("<span class='error' style= 'color:red'>Your password cannot be less than 5 characters</span>");
					$(".error").fadeIn(500);
				}else{
					password.css("border-color", "green");
					password.parent().find(".error").remove();
				}

				if(cPassword.val().length < 5 || ( cPassword.val()!=  password.val())){
					validated = false;
					cPassword.css("border-color", "red");
					cPassword.parent().append("<span class='error' style='color:red'>Password doesn't match</span>");
					$(".error").fadeIn(500);
				}else{
					cPassword.css("border-color", "green");
					cPassword.parent().find(".error").remove();
				}

				if(email.val().length < 1 ){
					validated = false;
					email.css("border-color", "red");
					email.parent().append("<span class='error' style='color:red'>Email is incorrect, Please try again</span>");
					$(".error").fadeIn(500);
				}else{
					email.css("border-color", "green");
					email.parent().find(".error").remove();
				}

				if( document.getElementById("avatar").files.length == 0 ){
					validated = false;
					$('#avatar').css("border-color", "red");
					$('#avatar').parent().append("<span class='error' style='color:red'>File is not chosen.</span>");
					$(".error").fadeIn(500);
				}else{
					$('#avatar').css("border-color", "green");
					$('#avatar').parent().find(".error").remove();
				}

				if(validated){
					msg = "Your information has been created\n";

					msg += "Your Username is: " + username.val() + "\n";

					var confirmation= confirm(msg);
					if (confirmation){
						parent.$.colorbox.close();
						return true;
					}else
					return false;
				}
				return false;
			})

			$("#registration_form").on('reset', function(e){
				$(this).find(".error").remove();

				username = $("input[name='username']"),
				password = $("input[name='password']"),
				email = $("input[name='email']"),
				cPassword = $("input[name='confirm_password']"),

				username.css("border-color", "inherit");
				username.parent().find(".error").remove();
				password.css("border-color", "inherit");
				cPassword.css("border-color", "inherit");
				email.css("border-color", "inherit");
				email.parent().find(".error").remove();
			});
		});
	</script>
</body>
</html>