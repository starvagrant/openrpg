<?php
require 'login.php';

$db_database = 'openrpg';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

function sanitize_form_string($string){
	global $connection;
	$string = strip_tags($string);
	$string = stripslashes($string);
	$string = htmlentities($string);	
	$string = $connection->mysql_real_escape_string($string);
	return $string;
}

function make_select_element($name, $size){
	global $connection;
	$sql_select = "SELECT char_id,char_name from characters; ";
	$result = $connection->query($sql_select);

	if (!$result) die('connection failed');
	$rows = $result->num_rows;

	if ($rows < 10) {
		$select = "<select name=\"$name\" size=\"$rows\"> \n";
	} else {
		$select = "<select name=\"$name\" size=\"10\"> \n";
	}

	for ($i = 0; $i < $rows; $i++){
		$result->data_seek($i);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$option_text = $row['char_name'];
		$option_value = $row['char_id'];
		$select .= "\t <option value=\"$option_value\">$option_text</option> \n";
	} 

	$select .= "</select>";
	echo $select;
	$result->close();
}
if ($_GET)
{
		
}

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
<!-- record a death -->
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
			<button type="submit"> Submit </button>
			<label> Location 
				<input type="text" name="location" maxlength="28" />
			</label>
		</p>
		<p>
			<label> Cause of Death
				<textarea name="cause_of_death" cols=20 rows=3> </textarea>
			</label>
		</p>
	</form>
</body>
</html>
