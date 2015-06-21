<?php
require 'login.php';

$db_database = 'openrpg';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

function print_character_options(){
	global $connection;
	$sql_select = "SELECT `char_name` FROM characters; ";
	$result = $connection->query($sql_select);
	if (!$result) die ('no connection');
	$rows = $result->num_rows;

	echo "<select size=$rows>\n";
	for ($i = 0; $i < $rows; $i++){
		$result->data_seek($i);
		$table_row = $result->fetch_array(MYSQLI_ASSOC);
		if ($i === 0) {
			echo "<option select=\"selected\"> {$table_row['char_name']} </option>\n";
		} else {
		echo "<option> {$table_row['char_name']} </option>\n";
		}
	} // end for
	echo "</select>\n";
	$result->close();
}
function put_info_into_json_file(){
	global $connection;
	$sql_select = "SELECT * FROM events LIMIT 200; ";
	$result = $connection->query($sql_select);
	if (!$result) die ('no connection');
	$rows = $result->num_rows;
	$json = " var events = [ \n";
	for ($i = 0; $i < $rows; $i++){
		$result->data_seek($i);
		$table_row = $result->fetch_array();
		$json .= <<<_JSON
			{
			"event": {$table_row["event_id"]} , 
			"character": {$table_row["char_id"]} , 
			"eventType": {$table_row["type"]} , 
			"text": {$table_row["text"]}  
			},

_JSON;
	} // end for
	$last_comma = strrpos($json,',', -1);
	$json= substr($json, 0, $last_comma);

$json .= " ]; ";
file_put_contents('events.jsonp', $json);
}

put_info_into_json_file();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
	<meta charset="utf-8">
<title></title>
<style>
</style>
</head>

<body>
	<form action="<?php echo "{$_SERVER['PHP_SELF']}" ?>" method="get">
		<?php print_character_options(); ?>
		<button type="submit">New Character</button>
	</form>
	<form action="<?php echo "{$_SERVER['PHP_SELF']}" ?>" method="get">
		<label> Enter Event: <textarea></textarea>	
		<label> Event Type: </label>
		<label> Event <input type="radio" name="event_type" value="event" /> </label>
		<label> Mission <input type="radio" name="event_type" value="mission" /> </label>
		<label> Friend <input type="radio" name="event_type" value ="friend" /> </label>
		<label> Enemy <input type="radio" name="event_type" value="enemy" /> </label>
	</form>
	<script src="events.jsonp"></script>


</body>
</html>
