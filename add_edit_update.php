<?php
include('session.php');

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shopnow';

$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

$orderid = $_GET['orderid'];
$title = $_GET['title'];
$description = $_GET['description'];
$category = $_GET['category'];
$price = $_GET['price'];

//echo $title . "		". $description . "		". $category . "		". $price . "		". $id;
$sql = 'UPDATE adds SET title="'.$title.'",description="'.$description.'",`category`="'.$category.'",`price`="'.$price.'" WHERE id ='.$orderid;
$mysqli_result = mysqli_query($db,$sql);
if($mysqli_result){
	header("Location: person_page.php");
}
else{
	header("Location: person_page.php");
}

?>