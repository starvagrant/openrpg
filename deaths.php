<?php
require 'login.php';

$dsn = 'mysql:host=localhost;dbname=openrpg';
$pdo = new PDO($dsn, $db_username, $db_password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function print_dump($var){
	echo "<pre>\n"; var_dump($var); echo "</pre>\n";
}

function sanitize_form_string($string){
	$string = strip_tags($string);
	$string = htmlentities($string);	
	return $string;
}

function make_select_element($name, $size){
	global $pdo;
	$sql_count = "SELECT COUNT(char_id) FROM characters; ";
	$count_statement = $pdo->query($sql_count);
	$rows = $count_statement->fetchColumn();
									// this selects all characters
									// including dead ones
	$sql_select = "SELECT c.char_id, c.char_name, d.victim_id 
		FROM characters as c LEFT JOIN deaths as d 
		ON c.char_id=d.victim_id
		WHERE d.victim_id IS NULL; "; 

try{
	$result_statement = $pdo->query($sql_select);
} catch (PDOException $e){
	print_dump($e);
}

	if ($rows < 10) {
		$select = "<select name=\"$name\" size=\"$rows\"> \n";
	} else {
		$select = "<select name=\"$name\" size=\"10\"> \n";
	}

	while ($row = $result_statement->fetch()){
		$option_text = $row['char_name'];
		$option_value = $row['char_id'];
		$select .= "\t <option value=\"$option_value\">$option_text</option> \n";
	} 

	$select .= "</select>";
	echo $select;
}
if ($_GET)
{
	$death_id = 0;
	$victim = sanitize_form_string($_GET['victim']);
	$killer = sanitize_form_string($_GET['killer']);
	$location = sanitize_form_string($_GET['location']);
	$date = date('Y:m:d');
	$cause_of_death = sanitize_form_string($_GET['cause_of_death']);
	$removed_from_play = true;	
try {
	$pdo->beginTransaction();

	$sql_for_deaths_table = "INSERT INTO deaths VALUES (?,?,?,?,?,?)";
	$statement = $pdo->prepare($sql_for_deaths_table);
	$statement->execute(array($death_id, $victim, $location, $date, $cause_of_death, $removed_from_play));
	$statement = null;

	$sql_retrieve_count = "SELECT COUNT(*) FROM deaths;";
	$result = $pdo->query($sql_retrieve_count);
	$row = $result->fetch();
	$death_id_on_killings_table = (int)$row[0]; // returns count(*)
	if (!$result) die ('query did not work');

	$sql_for_killings_table = "INSERT INTO killings VALUES(?,?,?);";
	$sql_for_killings_table;
	$statement = $pdo->prepare($sql_for_killings_table);
	$statement->execute(array($victim, $killer, $death_id_on_killings_table));

	$pdo->commit();


} catch (PDOException $e){
	$pdo->rollBack();
	$error = $e->getMessage();
}
} // end if
/*
 	} else {
		ob_start();
		var_dump($statement);
		$a=ob_get_contents();
		error_log($a);
		ob_end_clean();
	}
*/

?>

<!DOCTYPE html>
<html lang="en-us">

<head>
	<meta charset="utf-8">
<title></title>
<style>
label {
  position: float;
}
</style>
</head>

<body>
<!-- record a death 
	<?php if ($error) echo "<p>$error</p>\n"; ?>
-->
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
		<p>
			<label>Who died?
				<?php make_select_element('victim', 10); ?>
			</label>
			<label> Who's the killer?
				<?php make_select_element('killer', 10); ?>
			</label>
		</p>
		<p>
			<label> Location 
				<input type="text" name="location" maxlength="28" />
			</label>
		</p>
		<p>
			<label> Cause of Death
				<textarea name="cause_of_death" cols=20 rows=3> </textarea>
			</label>
		</p>
		<button type="submit"> Submit </button>
	</form>
</body>
</html>
