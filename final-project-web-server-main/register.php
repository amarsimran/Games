<?php
    include_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    include_once 'connection.php';
        $result = mysqli_query($conn, "SELECT * FROM player WHERE userName='$username'");
        if (mysqli_num_rows($result) > 0) {
            echo '<br/><br/><br/><h2><a href = "RegistrationForm.php">Sorry, this username already exists. Please, choose another one.</a><h2><br/><br/><br/>';
            
        }
   

   else{
    

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $registrationTime = date('Y-m-d H:i:s');
        $query = "INSERT INTO player (fName, lName, userName, registrationTime) VALUES ('$firstName', '$lastName', '$username', '$registrationTime')";
        mysqli_query($conn, $query);
        $playerId = mysqli_insert_id($conn);
        $query = "INSERT INTO authenticator (passCode, registrationOrder) VALUES ('$passwordHash', $playerId)";
        mysqli_query($conn, $query);

        echo "<center><br/><br/><br/>";
    
        echo '<b><a href="index.php">Success!<br/>Go to Login Form</a></b>';
        echo "</center><br/><br/><br/>";
    }
}

    include_once 'footer.php';
?>
