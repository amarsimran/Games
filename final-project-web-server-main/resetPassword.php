<!DOCTYPE html>
<html>

<head>
    <title>Password Modification Form</title>
    <link href="css/registerFormStyle.css" rel="stylesheet" type="text/css">

</head>

<body>
    <br /><br /><br /><br /><br />
    <?php
    include_once 'header.php';
    include_once 'connection.php';
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*])[A-Za-z\d@#$%^&*]{8,}$/';
        
        if (preg_match($pattern, $password)) {
            echo "<b><p style='color:red;' >" ."Success!"."</p></b>";
           
            $sql = "SELECT registrationOrder FROM player WHERE userName='$username'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $registrationOrder = $row["registrationOrder"];

               
                if ($password == $confirm_password) {
                    
                    $passCode = password_hash($password, PASSWORD_DEFAULT);

                    
                    $sql = "UPDATE authenticator SET passCode='$passCode' WHERE registrationOrder=$registrationOrder";
                    if (mysqli_query($conn, $sql)) {

                        echo "<b><p style='color:green;'>" . "Password reset successful." . "</p></b>";
                    } else {
                        echo "<b><p style='color:red;'>" . "Error updating password: " . mysqli_error($conn) . "</p></b>";
                    }
                } else {
                    echo "<b><p style='color:red;' >" . "New password and confirm password do not match.<br/>" . "</p></b>";
                    echo '<a href="passwordModificationForm.php">Go Back to Password Reset Page</a>';
                }
            }
        } else {
            echo "<b><p style='color:red;'>" . "Username not found.<br/>" . "</p></b>";
            echo '<a href="passwordModificationForm.php">Go Back to Password Reset Page</a>';
        }
    } else {
        
        echo "<b><p style='color:red;' >" ."Password must be at least 8 characters long and include at 
        least one uppercase letter, one lowercase letter, one number, and one special character (@#$%^&*)"."</p></b>";
        echo '<a href="passwordModificationForm.php">Go Back to Password Reset Page</a>';
    }
    mysqli_close($conn);
    ?>
    <br />
    <b><a href="main.php">Go To Home Page</a></b>
    <br /><br /><br /><br /><br />
    <?php
    include_once 'footer.php'
    ?>

</body>

</html>