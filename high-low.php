<?php

var_dump($argc);

if ($argc < 3) {
	echo "Too Few!\n";
	echo "Please Pass 2 arguments that are numeric numbers for High Low Game \n";
	die;
} else if ($argc > 3) {
	echo "too many!\n";
	echo "Please Pass 2 arguments that are numeric numbers for High Low Game \n";
	die;
} else if (!is_numeric($argv[1]) || !is_numeric($argv[2])){
	echo "Please Pass 2 arguments that are numeric numbers for High Low Game \n";
	die;
}


$randomNumber = rand($argv[1], $argv[2]);

fwrite(STDOUT, "pick a numeric number between $argv[1] and $argv[2] \n");

fwrite(STDOUT, "GUESS? \n");
$pickedNumber = trim(fgets(STDIN));
$round = 10;

do {
	if ($round != 0) {
		if (is_numeric($pickedNumber) && $pickedNumber > 0 && $pickedNumber < 100 && $pickedNumber > $randomNumber){
			fwrite(STDOUT, "LOWER \n");
		} else if ($pickedNumber < $randomNumber && is_numeric($pickedNumber) && $pickedNumber > 0 && $pickedNumber < 100) {
			fwrite(STDOUT, "HIGHER \n");
		} else {
			fwrite(STDOUT, "Nice try Slick. Follow the rules! \n");
		}
	}  
	if($round == 0 && $pickedNumber != $randomNumber){
		fwrite(STDOUT, "Game over! You are out of guesses. \n");
		exit(0);
	}
	$round -= 1;
	fwrite(STDOUT, "You have $round guesses left. \n");
	fwrite(STDOUT, "Next GUESS? \n");
	$pickedNumber = trim(fgets(STDIN));
} while ($pickedNumber != $randomNumber);

fwrite(STDOUT, 'GOOD GUESS!!! ');

exit(0);


