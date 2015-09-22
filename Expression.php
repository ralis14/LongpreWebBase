<?php


	function main(){
		$urlInput = fopen("http://cs5339.cs.utep.edu/longpre/expressions.txt", "r");
		$inputLine = "";
		$indent = "    ";
		$header = "<html> \n" . 
		"<head>\n" .
		"<title> Expression Evaluator</title>" .
		"</head>\n" .
		"<body>";
		printf("%s", $header);

		while(($inputLine = fgets($urlInput)) != NULL )
		{
	
		$two = trim($inputLine);	
		print("$indent"."$two"."<br>");
		$e = new ExpressionString($two);
		try
			{
				$val = evalExpr($e);
				if($e->getIndex() != strlen($two)){
					throw new Exception();
				}
				else
					print("$indent"."Result: ". "$val");
			}
			catch(Exception $ex)
			{
				if($e->getIndex() >= strlen($two))
					print("$indent"."Invalid Expression, unexpected end of line");
				else
					print("$indent"."Invalid Expression, unexpected character at index: " .$e->getIndex());
			}
			print("<br><br>");
		}
		fclose($urlInput);
		$footer = "</body> \n"."</html>";
		printf("%s", $footer);
	}


	function evalDigit($e)
	{
		if($e->getCurrentChar() - (int)'0' && $e->getCurrentChar() <= '9')
		{
			$result = $e->getCurrentChar() - (int)'0';
			$e->advance();
			return $result;
		}
		else
		{
			throw new Exception();
		}
	}

	function evalTerm($e)
	{
		$result;
		if ($e->getCurrentChar() === '(' )
		{
			$e->advance();
			$result = evalExpr($e);
			if($e->getCurrentChar() !== ')' )
			{
				throw new Exception();
			}
			$e->advance();
		}
		else
		{
			$result = evalDigit($e);
		}
		return $result;
	}

	function evalExpr($e)
	{
		$result = evalTerm($e);
		while ($e->getCurrentChar() === '+' || $e->getCurrentChar() === '-')
		{
			switch ($e->getCurrentChar()) {
				case '+':
					$e->advance();
					$result += evalTerm($e);
					break;
				
				case '-':
					$e->advance();
					$result -= evalTerm($e);
					break;
			}
		}
		return $result;
	}

	