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
define("SPECIAL_CHARACTERS_COUNT", 0);
define("INCLUDE_HYPHENS", false);
define("CASE_SELECTION", "lower");
define("DICTIONARY_LOCATION", "http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html");

// return a random pick of words
function get_words($count) {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => DICTIONARY_LOCATION,
		CURLOPT_USERAGENT => 'p2.oprisan.com password generator'
	));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);

	// Create a words dictionary
	preg_match_all("'<li>(.*?)</li>'si", $resp, $match);
	$words = array();
	foreach($match[1] as $word) {
		array_push($words, trim($word));
	}
	// Close request to clear up some resources
	curl_close($curl);

	// Return a random selection of words
	$picks = array_rand($words, $count);
	$words_picked = array();
	foreach($picks as $key => $pick) {
		array_push($words_picked, $words[$pick]);
	}

	return $words_picked;
}

// get a pick of special characters
function get_special_chars($count) {
	$possible = "#$%^&*()+=-[]';,./{}|:<>?~";
	$result = substr(str_shuffle($possible), 0, $count);

	return $result;
}

// get a pick of numbers
function get_numbers($count) {
	echo $cound;
	$possible = "0123456789";
	$result = substr(str_shuffle($possible), 0, $count);

	return $result;
}

// set up default response
$password = null;
$data = array('success' => false, 'result' => $password);

$settings = array(
	'wordCount' => $_POST['wordCount'] ? (int)$_POST['wordCount'] : WORD_COUNT,
	'numbersCount' => $_POST['numbersCount'],
	'specialCharactersCount' => $_POST['specialCharactersCount'] ? (int)$_POST['specialCharactersCount'] : SPECIAL_CHARACTERS_COUNT,
	'includeHyphens' => $_POST['includeHyphens'],
	'caseSelection' => $_POST['caseSelection'] ? $_POST['caseSelection'] : CASE_SELECTION
);

// get raw words picked based on setting
$words = get_words($settings['wordCount']);

// build special chars selection
if ($settings['specialCharactersCount']) {
	$specialChars = get_special_chars($settings['specialCharactersCount']);
} else {
	$specialChars = "";
}

// get random numbers
if ($settings['numbersCount']) {
	$numbers = get_numbers($settings['numbersCount']);
} else {
	$numbers = "";
}

// upper or lower case the words
$words = array_flip($words);
if ($settings['caseSelection'] == "lower") {
	$words = array_change_key_case($words, CASE_LOWER);
} else {
	$words = array_change_key_case($words, CASE_UPPER);	
}
$words = array_flip($words);

// add hyphens and convert array of words to string
if ($settings['includeHyphens'] == "true") {
	$words_string = implode('-', $words);
} else {
	$words_string = implode('', $words);
}

$password = $words_string.$specialChars.$numbers;

// return results to client
if ($password != null) {
	$data['result'] = $password;
	$data['success'] = true;
}

header('Content-Type: application/json');
echo json_encode($data);

?>
