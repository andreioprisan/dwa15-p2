$(function() {
	$('#generatePassword').on('click', function() {
		// get raw input to variables
		var wordCount = $('select[name="wordCount"]').val();
		var numbersCount = $('input[name="numbersCount"]').val();
		var specialCharactersCount = $('input[name="specialCharactersCount"]').val();
		var includeHyphens = $('input[name="includeHyphens"]').prop('checked');
		var caseSelection = $('input[name="caseSelection"]:checked').val()

		// validate user input
		if (numbersCount != "" && !$.isNumeric(numbersCount)) {
			alert('Please enter a number for the number of numbers to include!');
			return false;
		}

		if (specialCharactersCount != "" && !$.isNumeric(specialCharactersCount)) {
			alert('Please enter a number for the number of special characters to include!');
			return false;
		}

		// post settings to the password generator and display results
		$.post(
			"generate.php", 
			{ 
				wordCount: wordCount, 
				numbersCount: numbersCount, 
				specialCharactersCount: specialCharactersCount, 
				includeHyphens: includeHyphens, 
				caseSelection: caseSelection 
			}).done(function( data ) {
				if (data && data.success == true) {
					$('#generatedPassword').html(data.result);
					$('#generatedPassword').show();
				} else {
					alert('something went wrong! please try again!');
				}

				return false;
		  });

		return false;
	});
});