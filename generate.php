<?php

/* Password generator based on the following array inputs:
	wordCount: (int) the number of words to include, 
	numbersCount: (int) the number of numbers to include, 
	specialCharactersCount: (int) the number of special chars to include, 
	includeHyphens: (bool) include hyphens or not, 
	caseSelection: (enum: upper, lower, first);
*/

define("WORD_COUNT", 2);
define("NUMBERS_COUNT", 1);
define("SPECIAL_CHARACTERS_COUNT", 1);
define("INCLUDE_HYPHENS", false);
define("CASE_SELECTION", "lower");

// set up default response
$password = null;
$data = array('success' => false, 'result' => $password);

$settings = array(
	'wordCount' => $_POST['wordCount'] ? (int)$_POST['wordCount'] : WORD_COUNT,
	'numbersCount' => $_POST['numbersCount'] ? (int)$_POST['numbersCount'] : NUMBERS_COUNT,
	'specialCharactersCount' => $_POST['specialCharactersCount'] ? (int)$_POST['specialCharactersCount'] : SPECIAL_CHARACTERS_COUNT,
	'includeHyphens' => $_POST['includeHyphens'] ? (bool)$_POST['includeHyphens'] : INCLUDE_HYPHENS,
	'caseSelection' => $_POST['caseSelection'] ? $_POST['caseSelection'] : CASE_SELECTION
);

// return results to client
if ($password != null) {
	$data['result'] = $password;
	$data['success'] = true;
}


header('Content-Type: application/json');
echo json_encode($data);

?>
