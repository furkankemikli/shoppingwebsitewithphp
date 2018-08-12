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
	$id = $_GET['orderid'];
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'shopnow';
	
	$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

	$sql = "SELECT * FROM adds WHERE id=$id";

	$mysqli_result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($mysqli_result);
	if($count>0){
		while($row = mysqli_fetch_assoc($mysqli_result)){
			echo '<div align="center">
					<img src="data:image/jpeg;base64,' .base64_encode($row['image']).'" style="width:50%">
				  </div>


				  <div class="main">
				  <div style="overflow-x:auto;">
				  <table>
				  <tr>
				  <th style="display:none;">ID</th>
				  <th>Title</th>
				  <th>Description</th>
				  <th>Category</th>
				  <th>Price</th>
				  <th>Expiration Date</th>
				  <th>Owner</th>
				  </tr>';
			echo '<tr>
					<td class="id" style="display:none;">'.$row['id'].'</td><td>'
					  . $row['title']. "</td><td class=".$row['category'].">" 
					  . $row['description']. "</td><td>"
					  . $row['category']. "</td><td>"
					  . $row['price']. "</td><td>"
					  . $row['expiredate']. "</td><td>"
					  . $row['username']. "</td>
				  </tr>			
			";			
		}		
	}
	?>
  </table>
  <form style="display: inline; background-color: #FE642E" name= "add_page_login_message" method="post" action="login_form.php">
  <button class="button button2" style="font-size:12px">Send a Message</button>
  </form>
  </div>
</div>

</body>
</html>
