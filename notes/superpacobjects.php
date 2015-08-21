<?php
//	ok, where's the logic?
//	first, determine who wins an election.
function print_dump($var){
	echo "<pre>\n";
	var_dump($var);
	echo "</pre>\n";
}

Class Dice {
	static public function Roll() {
		$die = rand(1,6);
		return $die;
	}
	function __construct(){
	}
} 

Class Race {
	public $ranPrimary;
	public $incumbentCandidates;
	public $oppositionCandidates;

	function __construct($ranPrimary = false){
		$this->ranPrimary = $ranPrimary;
		$this->incumbentCandidates = array();
		$this->oppositionCandidates = array();
	}
}

Class Electorate{
	public $candidatesPresident;
	public $candidatesSenate;
	public $candidatesHouse;

	function __construct($candidates = array() ){
		$this->candidatesPresident = $candidates;
		$this->candidatesSenate = $candidates;
		$this->candidatesHouse = $candidates;
	}
	static public function printTable(){
		echo <<<_TABLE
		<table>
			<tr>
				<td>*</td>
				<td>*</td>
			</tr>
			<tr>
				<td>1</td>
				<td>2</td>
			</tr>
		</table>
_TABLE;

	}
}

?>


<!DOCTYPE html>
<html lang="en-us">

<head>
	<meta charset="utf-8">
<title>Candidates</title>
<style>
</style>
</head>

<body>
<?php
	Electorate::printTable();

	$game = new Electorate();
	$yoyoyo = new ArrayConstruct();
	print_dump($game);
?>
</body>
</html>
