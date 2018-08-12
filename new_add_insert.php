<?php
include('session.php');

$title = $_POST['title'];
$description = $_POST['description'];
$category = $_POST['category'];
$price = $_POST['price'];
$username = $_SESSION['username'];

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$db = mysqli_connect('localhost', 'root', '', 'shopnow');
$sql = 'INSERT INTO adds (title, description, image, category, price, release_date, expiredate,username) VALUES ("'.$title. '", "' .$description. '", "' .$image. '", "' .$category. '", "' .$price. '", CURRENT_TIMESTAMP() , CURRENT_TIMESTAMP() + INTERVAL 60 DAY , "' .$username. '")';
$mysqli_result = mysqli_query($db,$sql);
if($mysqli_result){
	header("Location: person_page.php");
}else{
	header("Location: new_add.html");
}
?>