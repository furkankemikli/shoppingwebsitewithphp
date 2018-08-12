<?php
include('session.php');

$message = $_POST['message'];
$id = $_POST['orderid'];
$sender = $_SESSION['username'];

$db = mysqli_connect('localhost', 'root', '', 'shopnow');

$select_sql = "SELECT members.username FROM members LEFT JOIN adds ON members.username=adds.username WHERE adds.id = '$id'";

$mysqli_result = mysqli_query($db,$select_sql);

$row = mysqli_fetch_assoc($mysqli_result);

$receiver = $row['username'];
$sql = 'INSERT INTO messages (sender, receiver, senddate,link, message) VALUES ("'.$sender. '", "' .$receiver. '", CURRENT_TIMESTAMP() , "' .$id. '","'.$message.'")';

if($sender != $receiver){
$mysqli_result = mysqli_query($db, $sql);
	if($mysqli_result){
		//echo 'success';
	}
	else{
		//echo 'failed';
	}
}else{
	//echo 'failed because same users';
}

?>