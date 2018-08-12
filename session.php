<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shopnow';

$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");
   
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
   
   $user_check = $_SESSION['username'];
   
   $ses_sql = mysqli_query($db,"select username from members where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:login_form.php");
   }
?>