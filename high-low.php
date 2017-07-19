<?php

$randomNumber = rand(1, 100);

fwrite(STDOUT, "pick a numeric number between 1 and 100 \n");

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


