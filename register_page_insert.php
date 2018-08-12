<?php

$options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['uname'];
$email = $_POST['email'];
$password = $_POST['psw'];
$repeatpassword = $_POST['psw-repeat'];
$location = $_POST['location'];
$birthdate = $_POST['bday'];
$sex = $_POST['gender'];


$db = mysqli_connect('localhost', 'root', '', 'shopnow');

if($password == $repeatpassword && $password != ""){
	
	$password = password_hash($_POST['psw'], PASSWORD_BCRYPT, $options);
	$sql = 'INSERT INTO members (name, surname, username, email, password, location,birthdate,sex) VALUES ("' .$firstname. '", "' .$lastname. '", "' .$username. '", "' .$email. '", "' .$password. '", "' .$location. '", "' .$birthdate. '", "' .$sex. '")';
	$mysqli_result = mysqli_query($db, $sql);
	if($mysqli_result){
		session_start();		
		$_SESSION['username'] = $username;
		header("Location: main_page_logout.php");
	}else{
		header("Location: register_page.php");
	}
}
else{
		header("Location: register_page.php");
}
?>