<h1>Create</h1>
<hr>
<form action='<?php echo $_SERVER['PHP_SELF'] ?>' method = 'post'>
	<label>Database Name:</label>
	<input type="text" name="dbname">
	<br><br>
	<input type="radio" name="operation" value='create'>
	<label>Create</label>
	<input type="radio" name="operation" value='delete'>
	<label>Delete</label>
	<br><br>
	<button>OK</button></form>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$dbname = $_POST['dbname'];
	$operation = $_POST['operation'];
	include('connect.php');

	if($operation == 'create')
		$query = "CREATE DATABASE $dbname";
	else
		$query = "DROP DATABASE $dbname";

	if(mysqli_query($conn, $query)){
		echo "Database $dbname Created Successfully";
	}

}else{
	echo "Form not submitted";
}
?>
