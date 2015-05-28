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

function get_result_statement($pdo, $query){
	try { $result_statement = $pdo->query($query); } 
	catch (PDOException $e) {
		$error = $e->get_message();
	}
	return $result_statement;
}

function make_named_query($name) {
	// remember order of select names is important.
	// first value option value, second option text	
	switch ($name){
	case 'killer':
	case 'victim':
		$sql_select = "SELECT c.char_id, c.char_name, d.victim_id 
			FROM characters as c LEFT JOIN deaths as d 
			ON c.char_id=d.victim_id
			WHERE d.victim_id IS NULL; "; 
		return $sql_select;
	break;
	case 'death':
		$sql_select = "SELECT death_code, name from death_codes; ";
		return $sql_select;
	break;
	default:
		return "";
	break;
	}
}

function make_select_element($pdo, $name, $size, $table){
	$sql_count = "SELECT COUNT(*) FROM $table; ";
	$count_statement = $pdo->query($sql_count);
	$rows = $count_statement->fetchColumn();
									// this selects all characters
									// including dead ones
	$sql_select = make_named_query($name);
	$result_statement = get_result_statement($pdo, $sql_select); 	

	if ($rows < $size) {
		$select = "<select name=\"$name\" size=\"$rows\"> \n";
	} else {
		$select = "<select name=\"$name\" size=\"$size\"> \n";
	}
	
	$selected = 0;	
	while ($row = $result_statement->fetch()){
		// rows have been ordered via the maked_name_query function
		$option_value = $row[0];
		$option_text = $row[1];
		if ($selected == 0){
			$select .= "\t <option value=\"$option_value\" selected>$option_text</option> \n";
		} else {
			$select .= "\t <option value=\"$option_value\">$option_text</option> \n";
		}	
	$selected++;
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
	$death_code = sanitize_form_string($_GET['death_code']);
try {
	$pdo->beginTransaction();

	$sql_for_deaths_table = "INSERT INTO deaths VALUES (?,?,?,?,?,?)";
	$statement = $pdo->prepare($sql_for_deaths_table);
	$statement->execute(array($death_id, $victim, $location, $date, $cause_of_death, $death_code));
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
	<?php if ($error) echo "<p>$error</p>\n"; ?>

<!-- 
-->
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
		<p>
			<label>Who died?
				<?php make_select_element($pdo, 'victim', 10, 'characters'); print($select); ?>
			</label>
			<label> Who's the killer?
				<?php make_select_element($pdo, 'killer', 10, 'characters'); print($select); ?>
			</label>
		<p>
			<label> Type of Death	
				<?php make_select_element($pdo, 'death', 6, 'death_codes'); print($select); ?>
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
