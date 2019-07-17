<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Lab</title>
	<link rel="stylesheet" href="view/css/colorbox.css" />
	<link href="view/style.css" type="text/css" rel="stylesheet" />
	<link href="view/libs/prettify/prettify.css" type="text/css" rel="stylesheet" />
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	
	<style type="text/css">
		body {background-color:#C0C0C0;}
		h3 {text-align: center;}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="container">
			
			<div class="border border-dark pl-5" style="width:560px;margin-left: 300px;">

				<?php if (empty($logged_user)){?>
					<h3>Mini-Chat</h3>
					<form method="post" id= "login_form" name ="login_form" action="?controller=user&action=login">
						<div>
							<label for "username"> <strong> Username:  </strong></label>
							<input class="float:right m-1" type="text"  id="username" name="username" maxlength="20">
						</div>

						<div>
							<label for "password"> <strong>Password: </strong></label>
							<input class="float:right m-2" type="password" id="password" name="password" maxlength="50"> 
						</div>

						<input class="btn btn-success float:right" type="submit" name="login" value="Login"> 

						<a class='iframe btn btn-primary float:right' href="view/registrationForm.php">Register</a>

					</form>
				<?php }
				else{?>
					<h3>Welcome</h3>
					<?php 
					if (!empty($logged_user)) {?>
						<h3><?= $logged_user->getUsername()?></h3>
						<div>
							<form method="post" action="?controller=user&action=logout" >
								<img src="<?= $logged_user->getAvatar()?>" height=120; width=120; style="margin-left: 70px;">
								<input class="btn btn-primary float:right m-5"  type="submit" name="logout" value="Logout" class="btn btn-primary" > 


							</form>
						</div>
					<?php }
				}
				

				?>
			</div>
		</div>
	</div>
</div>
</div>

<div class="container">
	<div class="row">
		<div class="border border-dark pl-5" style="width:470px;margin-left: 130px;">
			<form method="post" action="?controller=post&action=send">
				<h3> Send a message </h3> <br>
				<textarea rows="4" cols="50" type="text" name="comment" value="comment" id ="comment"  >
				</textarea> <br>

				<?php if (!empty($logged_user)): ?>
					<input type="submit" name="send" Value="Send" class="btn btn-primary" >

					<?php else: ?>
						<input type="submit" name="send" Value="Send"  disabled="">

					<?php endif ?>
				</form>
			</div>

			<div class="border border-dark p-1" style="width:470px; ">
				<h3> Posts 	</h3>
				<div id="scrool" style="width: 100%;">
					<table>
						<tbody>
							<?php foreach ($posts as $post) { ?>
								<tr> <td ><img src="<?= $post['avatar'] ?>" height =80; width =80; ></td> 
									<td> <strong><?= $post['username'] ?> </strong> </td>
									<td> <?= $post['comment'] ?></td>

								</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script type="text/javascript" src="view/libs/prettify/prettify.js"></script>
	<script type="text/javascript" src="view/jquery.slimscroll.js"></script>
	<script src="View/jquery.colorbox.js"></script>
	<script>
		$(document).ready(function(){
			$(".iframe").colorbox({iframe:true, width:"70%", height:"70%"});
			var error_play = "<?php echo $is_err ?>";

			if(error_play){
				alert("<?php echo $error_message ?>");
			}


			$('#scrool').slimscroll();
		});

		$(function(){

			$("#login_form").submit(function(e){
				var validated = true,
				username = $("input[name='username']"),
				password = $("input[name='password']");
				$(this).find(".error").remove();


				if($('#username').val().length < 2){
					validated = false;
					username.css("border-color", "red");
					username.parent().append("<span class='error'>Your username cannot be less than 2 characters</span>");
					$(".error").fadeIn(500);
				}else{
					username.css("border-color", "green");
					username.parent().find(".error").remove();
				}
				if($('#password').val().length < 5){
					validated = false;
					password.css("border-color", "red");
					password.parent().append("<span class='error'>Your password cannot be less than 5 characters</span>");
					$(".error").fadeIn(500);
				}else{
					password.css("border-color", "green");
					password.parent().find(".error").remove();
				}
				if(validated){
					return true;
				}  
				alert ("Missing/ incomplete field(s).");
				return false;

			});
		});

		var error_play = "<?php echo $is_err ?>";

		if(error_play){
			alert("<?php echo $error_message ?>");
		}
	</script>
</body>
</html>
<?php unset($_SESSION['error']) ;?>   