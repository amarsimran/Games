<!DOCTYPE html>
<html>
    <head>
            <Title>User Login</Title>
            <link href="css/loginStyle.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <?php
    include_once 'header.php';
    ?>
        
        <form method="post" action="login.php" onsubmit="return checkForm()">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>  
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <button type="button" id="toggle-password">Show</button>
        </div>
        <br/><br/> 
        <div>  
            <input type="submit" name= "Connect" value="Connect">
            
            <a href="RegistrationForm.php"><input type="button" value="signUp"></a>
        </div>
      </form>
    <script>

    var toggleButton = document.getElementById('toggle-password');
    var passwordField = document.getElementById('password');
    
    toggleButton.addEventListener('click', function() {
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleButton.textContent = 'Hide';
      } else {
        passwordField.type = 'password';
        toggleButton.textContent = 'Show';
      }
    });

    function checkForm() {
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;

      if (username.trim() == "" || password.trim() == "") {
        alert("Please enter both username and password.");
        return false;
      }

      return true;
    }
  </script>
    <?php
    include_once 'footer.php';
?>
    </body>
</html>