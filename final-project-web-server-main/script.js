$(document).ready(function() {
	var lives = 6;
	var letters = generateRandomLetters();
	var minLetter = getMinLetter(letters);
	var maxLetter = getMaxLetter(letters);

	displayLetters(letters);

	$("#game-form").on("submit", function(event) {
		event.preventDefault();
		var userMinLetter = $("#min-letter").val().toLowerCase();
		var userMaxLetter = $("#max-letter").val().toLowerCase();

		// Check if user input is within the valid range of 'a' to 'z'
		if (!isValidLetter(userMinLetter) || !isValidLetter(userMaxLetter)) {
			$("#result").text("Invalid input! Please enter lowercase letters from 'a' to 'z'.");
			return;
		}

		if (userMinLetter == minLetter && userMaxLetter == maxLetter) {
			$("#result").text("Congratulations! You found the correct minimum and maximum letters.");
			$("#game-form").append("<p><a href='level5.php'>Play Again</a></p>");
			$("#game-form").append("<p><a href='level6.php'>Go to Next level</a></p>");

		} else if (userMinLetter == minLetter) {
			$("#result").text("You found the correct minimum letter, but the maximum letter is incorrect.");
			$("#game-form").append("<p><a href='level5.php'>Play Again</a></p>");

			lives--;
		} else if (userMaxLetter == maxLetter) {
			$("#result").text("You found the correct maximum letter, but the minimum letter is incorrect.");
			$("#game-form").append("<p><a href='level5.php'>Play Again</a></p>");
			lives--;
		} else {
			$("#result").text("Both minimum and maximum letters are incorrect.");
				$("#game-form").append("<p><a href='level5.php'>Play Again</a></p>");
			lives--;
		}

		if (lives <= 0) {
			$("#result").text("Game over! You have used all 6 lives.");
				$("#game-form").append("<p><a href='logout.php'>End Game</a></p>");
			$("#game-form :input").prop("disabled", true);
		} else {
			$("#game-form")[0].reset();
			letters = generateRandomLetters();
			minLetter = getMinLetter(letters);
			maxLetter = getMaxLetter(letters);
			displayLetters(letters);
		}
	});

	function generateRandomLetters() {
		var letters = "";
		var alphabet = "abcdefghijklmnopqrstuvwxyz";
		for (var i = 0; i < 6; i++) {
			var randomIndex = Math.floor(Math.random() * alphabet.length);
			letters += alphabet.charAt(randomIndex);
		}
		return letters;
	}

	function getMinLetter(letters) {
		return letters.split("").sort()[0];
	}

	function getMaxLetter(letters) {
		return letters.split("").sort()[5];
	}

	function displayLetters(letters) {
		$("#letters-container").text("Letters: " + letters);
	}

	function isValidLetter(letter) {
		return /^[a-z]$/.test(letter);
	}
});
