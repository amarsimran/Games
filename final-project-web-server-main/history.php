<!DOCTYPE html>
<html>
<head>
	
	<link href="css/tableStyle.css" rel="stylesheet" type="text/css">
    
</head>
<body>

<?php
    include_once 'header.php';
    include_once 'connection.php';

$sql = "SELECT id, fName, lName, result, livesUsed, scoreTime FROM history";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    echo "<br/><br/><br/><br/>";
    echo "<center><table class='styleTable'><tr><th>ID</th><th>Name</th><th>Result</th><th>Lives Used</th><th>Score Time</th></tr>";
    
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["id"]."</td><td>".$row["fName"]." ".$row["lName"]."</td><td>".$row["result"]."</td><td>".$row["livesUsed"]."</td><td>".$row["scoreTime"]."</td></tr>";

    }
    echo "</table></center>";
    echo "<br/><br/><br/><br/>";
} else {
    echo "No results";
}

$conn->close();

    include_once 'footer.php';
?>
</body>
</html>