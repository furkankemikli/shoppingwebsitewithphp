<?php
include('session.php');

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shopnow';

//take username and use it to take adds of it from database
//click olayını otomatik yaptır
$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

$username = $_SESSION['username'];
$id = $_POST['orderid'];
//add owner will be get from session
$sql = "SELECT username FROM viewers WHERE id = '$id'";

$mysqli_result = mysqli_query($db, $sql);

$result = "";
$count = mysqli_num_rows($mysqli_result);

if($count > 0){
	while($row = mysqli_fetch_assoc($mysqli_result)){
		if($row['username'] != $username)
			$result .=  $row['username']."\r";
	}	
}
echo $result;

?>