<!DOCTYPE html>
<html>
	<head>
		<title>Contact Developers</title>
		<link href="css/contactStyle.css" rel="stylesheet" type="text/css">
		<?php
				include_once 'header.php';
		?>
	</head>
	<body>
	<br/>
		<center>
		<h3>Contact Developers</h3>
		</center> 
		<form>
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>
			<label for="subject">Subject:</label>
			<input type="text" id="subject" name="subject" required>
			<label for="message">Message:</label>
			<textarea id="message" name="message" rows="5" cols="30" required></textarea>
			<br>
			<input type="submit" value="Submit" onclick="return sendEmail();">
		</form>
		<script>
			function sendEmail() {
				var name = document.getElementById('name').value;
				var email = document.getElementById('email').value;
				var subject = document.getElementById('subject').value;
				var message = document.getElementById('message').value;
				if (name == '' || email == '' || subject == '' || message == '') {
					alert('Please fill in all fields');
					
				} else {
					alert('Thanks for the feedback');
				}
				return false; 
			}
			</script>
			<?php
				include_once 'footer.php';
			?>
	</body>
</html>
