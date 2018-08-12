<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shopnow';

$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
//until here okay
$sql = "SELECT password FROM members m WHERE m.username = '$username'" ;
$mysqli_result = mysqli_query($db, $sql);
$rowcount = mysqli_num_rows($mysqli_result);
$row = mysqli_fetch_assoc($mysqli_result);
if(password_verify($password, $row['password'])){

if ($rowcount == 1) {
	$_SESSION['username'] = $_POST['username'];
	header("Location: main_page_logout.php");
}
else{
	header("Location: login_form.php");
}
}else{	
	header("Location: login_form.php");
}
mysqli_close($db);
?>