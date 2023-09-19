<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link href="css/registerFormStyle.css" rel="stylesheet" type="text/css">

</head>

<body>
    <br /><br /><br /><br /><br />
    <?php
    include_once 'header.php';
    session_start();
    include_once 'connection.php';
  
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT p.fName, p.lName, p.userName, a.passCode FROM player p INNER JOIN authenticator a ON p.registrationOrder = a.registrationOrder WHERE p.userName='$username'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['passCode'])) {
                $_SESSION['username'] = $row['userName'];

                header("Location: level1.php");
            } else {
                echo '<br/><br/><br/><b><a href="passwordModificationForm.php">Forgotten? Please, change your password</a></b><br/><br/><br/>';
            }
        } else {
            
            echo '<br/><br/><br/><b><a href="index.php">Sorry, you entered a wrong username</a></b><br/><br/><br/>';
        }
        
        mysqli_close($conn);
        ?>
    
    <br />
    
    <br /><br /><br /><br /><br />
    <?php
    include_once 'footer.php'
    ?>
</div>
</body>

</html>