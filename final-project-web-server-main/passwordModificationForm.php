<!DOCTYPE html>
<html>
<head>
	<title>Password Modification Form</title>
	<link href="css/passwordFormStyle.css" rel="stylesheet" type="text/css">
    <script>
   			function checkForm() {
				var username = document.getElementById("username").value;
				var password = document.getElementById("password").value;
				var confirm_password = document.getElementById("confirm_password").value;
				
				if (username.trim() == "" || password.trim() == "" || confirm_password.trim()=="") {
					alert("Please check all the fields.");
					return false;
				}

				return true;
				}
			
		</script>
</head>
<body>
<?php
    include_once 'header.php';
?>
	
		<form method="post" action="resetPassword.php" onsubmit="return checkForm()">
			
			<label for="username">Existing Username:</label>
			<input type="text" id="username" name="username" >
			
			<label for="password">New Password:</label>
			<input type="password" id="password" name="password" >
			
			<label for="confirm_password">Confirm New Password:</label>
			<input type="password" id="confirm_password" name="confirm_password" >
			<p>Password must meet the following requirements:</p>
		<ul>
			<li>At least 8 characters long</li>
			<li>Includes at least one uppercase letter</li>
			<li>Includes at least one lowercase letter</li>
			<li>Includes at least one number</li>
			<li>Includes at least one special character (@#$%^&amp;*)</li>
		</ul>
			<input type="submit" name="modify" value="Modify">
			<a href="RegistrationForm.php"><input type="button" value="signUp"></a>
			
		</form>
		
	<?php 
    	include_once 'footer.php'
    ?>
	</div>
</body>
</html>
