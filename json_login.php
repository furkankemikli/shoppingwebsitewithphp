<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
    box-sizing: border-box;
    background-color: #F7D358;
}
.header {
    padding: 15px;
    horizontal allignment: center;
    border: 1px solid gray;
    border-radius:6px;     
    background-color: #FE642E;
}
.main {
	width: 100%;
    float: left;
    padding: 15px;
    border: 1px solid gray;
    border-radius:6px;
}

table,th,td{
	border-left: 1px solid #000;
    padding: 15px;
}

table {
    border-collapse: collapse;
    width: 100%;
}

td {
    vertical-align: bottom;
}

table, td:first-child, th:first-child {
border-left: none;
}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button1 {border-radius: 12px;}
.button2 {width:100%;
		  border-radius: 12px;
          margin-top: 2px; }


img {
    margin-top: 2px;
    border-radius: 6px;
}

</style>
</head>
<body>



<div class="header">
  <form style="display: inline; background-color: #FE642E" name= "add_page_home" method="post" action="main_page_login.php">
  <button class="button button1" style="font-size:12px">HOME</button>
  </form>
  <form style="display: inline; background-color: #FE642E" name= "add_page_login" method="post" action="login_form.php">
  <button class="button button1" style="float: right;font-size:12px">LOGIN</button>
  </form>
  <h1 align="center" style="background-color: #FE642E">SHOPNOW MARKET</h1>
</div>

<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'shopnow';
	
	$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

	$sql = "SELECT * FROM adds";

	$mysqli_result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($mysqli_result);
   class Add {
      public $title = "";
      public $category  = "";
      public $owner = "";
	  public $price = "";
	  public $description = "";
	  public $expiredate = "";
   }

	while($row = mysqli_fetch_assoc($mysqli_result)){
		$e = new Add();
		$e->title = $row["title"];
		$e->category  = $row["category"];
		$e->owner = $row["username"];
		$e->price = $row["price"];
		$e->description = $row["description"];
		$e->expiredate = $row["expiredate"];

		echo json_encode($e);
	}
?>

</body>
</html>