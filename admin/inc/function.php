<?php
error_reporting(-1);
define('DB_NAME', 'chillbro_database');
define('DB_USER', 'chillbro_user');
define('DB_PASSWORD', 'IH!%mG8C!PBi');
define('DB_HOST', 'localhost');
function connect(){
	static $mysqli;
	$mysqli=new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	return $mysqli;
}
function disconnect($mysqli){
	mysqli_close($mysqli);
}
function select_option($id, $table, $fields, $value, $display, $order, $current)
{
	echo "<select id='".$id."' name='".$id."'>";
	echo "<option value='-1' disabled selected>Select an option</option>";
	$mysqli=connect();
	$sql="select * from `".$table."` ORDER BY ".$order;
	$res = mysqli_query($mysqli,$sql);
	while ($row = mysqli_fetch_array($res))
	{
		if($row[$value]==$current)
		{
			echo "<option value='".$row[$value]."' selected>".$row[$display]."</option>";
		}
		{
			echo "<option value='".$row[$value]."'>".$row[$display]."</option>";
		}
	}
	echo "</select>";
}
function fetch_value($field, $table, $id)
{
	$sql="select `".$field."` from `".$table."` where `id`='".$id."'";
	$mysqli=connect();
	$com=mysqli_query($mysqli, $sql);
	$dr=mysqli_fetch_array($com);
	disconnect($mysqli);
	return $dr[0]; 
}
function execute_query($sql)
{
	$mysqli=connect();
	mysqli_query($mysqli,$sql);
	$id=$mysqli->insert_id;
	disconnect($mysqli);
	return $id;
}

?>