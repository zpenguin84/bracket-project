<?php

require 'vendor/autoload.php';

use BracketValidator\BracketValidator as B;

if (empty($argv[1]))
{
	echo "Please use path to file as first argument\n";
	return;
}

if (!file_exists($argv[1]))
{
	echo "File not found\n";
	return;
}

$str = file_get_contents($argv[1]);
echo "----start file----\n";
echo $str;
echo "----end file----\n";

try
{
	$res = B::process($str);
	echo $res ? 'TRUE' : 'FALSE';
	echo "\n";
}
catch (InvalidArgumentException $e)
{
	echo 'Invalid Argument in position: ' . $e->getMessage() . "\n";
}

