<?php
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('utf-8');

//Generates random string between length of min_ and max_ length vars from a-z
function random_string($max_length, $min_length) {
	//Calculate random length of string between min_ and max_ length vars
	$length = floor(rand($min_length, $max_length));
	$string = "";
	for($i = 0; $i < $length; $i++) {
		//Generate random character from ASCII values 97-122 (a-z)
		$string = $string . chr(floor(rand(97, 122)));
	}
	return $string;
}

//Encodes the string in a random base (var num_base) with a separator of from chars A-Z
function string_encode($string, $multiplier, $base) {
	$string_array = str_split($string);
	$encoded_string = "";
	for($i = 0; $i < sizeof($string_array); $i++) {
		$separator = chr(floor(rand(65, 90)));
		$encoded_string = $encoded_string . $separator . base_convert(ord($string_array[$i]) * $multiplier, 10, $base);
	}
	return $encoded_string;
}
function obfuscate($js_file) {
	$str = file_get_contents($js_file);
	//Create array of length 7 filled with random strings
	$rand_vars = [];
	for($i = 0; $i <= 10; $i++) {
		$rand_vars[$i] = random_string(10, 4);
	}
	
	$num_base = floor(rand(16, 35));
	$dividor = Date("i");
	
	$encoded_string = string_encode($str, $dividor, $num_base);
	
	//return and generated encoded_string;
	$x = "var " . $rand_vars[10] . "=function(){document.removeEventListener('mousemove'," . $rand_vars[10] . ");" . $rand_vars[0] . "('" . $encoded_string . "')};document.addEventListener('mousemove'," . $rand_vars[10] . " );function " . $rand_vars[0] . "(" . $rand_vars[3] . "){var ". $rand_vars[8] . "=new Date();var " . $rand_vars[7] . "='Z';var " . $rand_vars[6] . "='A';var " . $rand_vars[2] . "=[];var " . $rand_vars[5] . "=new RegExp('['+" . $rand_vars[6] . "+'-'+" . $rand_vars[7] . "+']');var " . $rand_vars[1] . "=" . $rand_vars[3] . ".split(" . $rand_vars[5] . ");for(var i=0;i<" . $rand_vars[1] . ".length;i++){" . $rand_vars[2] . ".push(String.fromCharCode(parseInt(" . $rand_vars[1] . "[i]," . $num_base . ")/(" . $rand_vars[8] . ".getUTCMinutes())));}eval(" . $rand_vars[2] . ".splice(1," . $rand_vars[2] . ".length).join(''));}";
	echo $x;
}
?>