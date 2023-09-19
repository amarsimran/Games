<!DOCTYPE html>
<html>
<head>
    <?php include_once 'header.php';?>
	<title>Find Maximum and Minimum Letters</title>
    <link href="css/games.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<div>
		<p>Find the maximum and minimum letters from the following 6 random letters:</p>
		<p id="letters"></p>
	</div>
	<div>
		<form id="findMinMax">
			<label for="min">Minimum:</label>
			<input type="number" id="min" name="min" required>
			<label for="max">Maximum:</label>
			<input type="number" id="max" name="max" required>
            <br><br>
			<input type="submit" value="Submit">
            <a href ="logout.php"><input type="button" value="End session"></a>
            
            <br><br>
		</form>
	</div>
	<div>
		<p id="result"></p>
	</div>
	<script>
		$(document).ready(function() {
			var lives = 6; // number of lives
			var letters = [];
			for (var i = 0; i < 6; i++) {
				letters.push(Math.floor(Math.random() * 101)); // generate a random number from 0 to 100
			}
			$("#letters").text(letters.join(", ")); // display the letters
			$("#findMinMax").submit(function(event) {
				event.preventDefault();
				var min = parseInt($("#min").val());
				var max = parseInt($("#max").val());
				if (min == Math.min(...letters) && max == Math.max(...letters)) { // check if the user input is correct
					$("#result").text("Congratulations! You found the correct maximum and minimum letters.");
                    $("#game-form").append("<p><a href='level6.php'>Play Again</a></p>");
                    $("#game-form").append("<p><a href='main.php'>Home Page</a></p>");
                    $("#game-form").append("<p><a href='logout.php'>Sign Out</a></p>");

				} else {
					lives--;
					if (lives == 0) { // check if the user ran out of lives
						$("#result").text("Sorry, you ran out of lives. The correct maximum letter is " + Math.max(...letters) + " and the correct minimum letter is " + Math.min(...letters) + ".");
						$("#game-form").append("<p><a href='level6.php'>Play Again</a></p>");
                        $("#findMinMax :input").prop("disabled", true); // disable the form inputs
					} else {
                        
						$("#result").text("Sorry, that is incorrect. You have " + lives + " lives remaining.");
                        $("#game-form").append("<p><a href='level6.php'>Play Again</a></p>");
					}
				}
				$("#min").val(""); // clear the form inputs
				$("#max").val("");
			});
		});
	</script>
    <?php include_once 'footer.php';?>
</body>
</html>
