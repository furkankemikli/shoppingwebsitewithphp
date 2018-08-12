<?php
include('session.php');

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shopnow';

$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

$id = $_POST['orderid'];
$sql_message  = 'DELETE FROM messages WHERE link = '.$id;

$mysqli_result = mysqli_query($db,$sql_message);

if($mysqli_result){
	$sql_viewers= 'DELETE FROM viewers WHERE id='.$id;
	
	$mysqli_result = mysqli_query($db,$sql_viewers);
	if($mysqli_result){
	//add delete
	$sql = 'DELETE FROM adds WHERE id = '.$id;

	$mysqli_result = mysqli_query($db, $sql);
	if($mysqli_result){
		header("Location: person_page.php");
	}
	else{
		header("Location: person_page.php");
	}
	}else{
		header("Location: person_page.php");
	}
}else{
		header("Location: person_page.php");
}
?>