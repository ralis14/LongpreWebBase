
<?php
	class ExpressionString{
	private $e = "";
	private $i = 0;
	private $currentChar = "empty";

	function __construct($s){
	$this->e = $s;
	$this->i = -1;
	$this->advance();
	}

	function calling(){
		printf (" String in Object: %s <br>", $this->e);
		printf (" Num in Object: %d <br>", $this->getIndex());
		printf (" currentChar in Object: %s <br>", $this->getCurrentChar());
	}

	function advance(){
		$elength;
		if ($this->i < strlen($this->e)){
			$this->i++;
		}
		if($this->i < strlen($this->e)){
			$this->currentChar = $this->e{$this->i};
		}else{
			$this->currentChar = ".";
		}
	}

	function getCurrentChar(){
		return $this->currentChar;
	}

	function getIndex(){
		return $this->i;
	}

}
