<html>
  <head>
    <link href="css/registerFormStyle.css" rel="stylesheet" type="text/css">
    <title>Register</title>
    <script>
      function validateForm() {
        const username = document.forms["registerForm"]["username"].value;
        const password = document.forms["registerForm"]["password"].value;
        const confirmPassword = document.forms["registerForm"]["confirmPassword"].value;
        const firstName = document.forms["registerForm"]["firstName"].value;
        const lastName = document.forms["registerForm"]["lastName"].value;

        
        if (
          username === "" ||
          password === "" ||
          confirmPassword === "" ||
          firstName === "" ||
          lastName === ""
        ) {
          alert("All fields are required");
          return false;
        }

       
        const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*])[A-Za-z\d@#$%^&*]{8,}$/;
        if (!pattern.test(password)) {
          alert("Password must contain at least one lowercase letter, one uppercase letter, one number, one special character and be at least 8 characters long.");
          return false;
        }

        
        if (password !== confirmPassword) {
          alert("Passwords do not match");
          return false;
        }

        
        return true;
      }
    </script>
  </head>
  <body>
    <?php include_once 'header.php'; ?>
    <br />
    <center>
      <h3>Sign-Up</h3>
    </center>
    <form name="registerForm" action="register.php" method="post" onsubmit="return validateForm()">
      <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" />
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" />
      </div>
      <div>
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" />
      </div>
      <div>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" />
      </div>
      <div>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" />
      </div>
      <div>
        <label for="agree">
          <input type="checkbox" name="agree" id="agree" value="yes" />
          I agree with the <a href="#" title="term of services">term of services</a>
        </label>
      </div>
      <div>
        <input type="submit" value="Create" name="create" />
        <a href="RegistrationForm.php"><input type="button" value="signUp" /></a>
      </div>
    </form>
    <?php include_once 'footer.php'; ?>
  </body>
</html>
