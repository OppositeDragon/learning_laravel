<?php
require  '/home/omen-pop/GitHub/learning_laravel/vendor/autoload.php';
// require __DIR__ . '/vendor/autoload.php';
use Cocur\Slugify\Slugify;

$slugify = new Slugify();
echo $slugify->slugify('Hello World!'); // hello-world


echo 2+2;

$catsName= 'Meowsalot';
echo 'The name of the cat is'.$catsName." and is shown as string interpolation in code \n";

function doubleNumber($x){
	return $x*2;
}

$doubledNumber =  doubleNumber(4);

if($doubledNumber>100){
	echo "The doubled number is greater than 100";
}else{
	echo "The doubled number is less than or equal 100";
}




echo "\n";