<?php
function test(){
	$file = '';
	$urlInput = fopen("http://cs5339.cs.utep.edu/longpre/expressions.txt", 'r');
	if($urlInput === FALSE){exit("Unable to open file!!");}
	while(!feof($urlInput)){$file .= fread($urlInput, 9999);}
	fclose($urlInput);
	printf("url: %s", $file);
	$header = "<html> \n".
	"<head>\n"
	."<title> Expression Evaluator</title>"
	."</head>\n"
	."<body>";
	print $header;
}