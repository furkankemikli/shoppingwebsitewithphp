<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
    margin-top: 2px;
	width: 100%;
    float: left;
    padding: 15px;
    border: 1px solid gray;
    border-radius:6px;
}

table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    border: none;
    text-align: left;
    padding: 8px;
}

.button {background-color: #4CAF50; /* Green */
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
.button2 {border-radius: 12px;
          font-size: 12px;
   		  padding: 10px 21px;}
.button3 {border-radius: 12px;
          font-size: 12px;
   		  padding: 10px 21px;
          background-color: #FF0000;}
.button4 {width:100%;
		  border-radius: 12px;
          margin-top: 2px; }

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body>


<div class="header">
<form style="display: inline; background-color: #FE642E" name= "person_page_home" method="post" action="main_page_logout.php">
  <button class="button button1" style="font-size:12px">HOME</button>
</form> 
  <form style="display: inline; background-color: #FE642E" name= "person_page_logout" method="post" action="logout.php">
  <button class="button button1" style="background-color: #ff0000; float: right;font-size:12px"> LOG OUT</button>
  </form>
  <h1 align="center" style="background-color: #FE642E">SHOPNOW MARKET</h1>
</div>

<div class="main">
<h2 align=center>MESSAGE LIST</h2>
<table>
			<tr>
				<th style='display:none;'>ID</th>
				<th>Sender</th>
				<th>Message </th>
				<th>Date</th>
				<th>Add Link</th>
			</tr>
<!--When click on message there will appear a modal-box to show message-->
<div style="overflow-x:auto;">
<?php
include('session.php');

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shopnow';


// Create connection
//TODO: Take receiver name and show his messages to him
$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

$id = $_SESSION['username'];

$sql = "SELECT * FROM messages WHERE receiver = '$id' ORDER BY senddate  DESC";

$mysqli_result = mysqli_query($db, $sql);
if($mysqli_result){
	$count = mysqli_num_rows($mysqli_result);
	if ($count > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($mysqli_result)) {
			if($row['sender'] != $row['receiver']){
			echo '<tr>
					<td class="id" style="display:none;">'. $row['link'].'</td><td>'
						. $row['sender']. "</td><td>" 
						. $row['message']. "</td><td>"
						. $row['senddate']. "</td>
						<td><button type='button' class='button button2 message_add_view' style='font-size:12px'>Click to View</button></td>
				</tr>"
			;}
		}
	}
}

mysqli_close($db);
?>
</table>
</div>

<h2 align="center">ADD LIST</h2>

<div style="overflow-x:auto;">
<?php
include('session.php');

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shopnow';

//take username and use it to take adds of it from database
//click olayını otomatik yaptır
$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

$id = $_SESSION['username'];
//add owner will be get from session
$sql = "SELECT * FROM adds WHERE username = '$id' ORDER BY release_date  DESC";

$mysqli_result = mysqli_query($db, $sql);
 echo "<table id='table'>
			<tr> 
				<th style='display:none;'>ID</th>
				<th>Image </th>
				<th>Title</th>
				<th>Category</th>
				<th>Price</th>
				<th>Release Date</th>
				<th>Viewers</th>
				<th>Edit/Delete</th>
			</tr>";

$count = mysqli_num_rows($mysqli_result);
if ($count > 0) {
     // output data of each row
     while($row = mysqli_fetch_assoc($mysqli_result)) {
		 $image = $row['image'];
         echo '
			<tr><td class="add_id" style="display:none;">'.$row['id'].'</td>
				<a target="_blank" href="data:image/jpeg;base64,' .base64_encode($row['image']).'">
				<td> 
				<img style="width:150px" src="data:image/jpeg;base64,' .base64_encode($row['image']).'"/>
				</a></td>
				<td>'
					  . $row['title']. "</td><td>" 
					  . $row['category']. "</td><td>"
					  . $row['price']. "</td><td>"
					  . $row['release_date']. "</td>
					<td><button type='button' class='button button2 add_viewers'>Viewers</button></td>    
					<td><button type=''button' class='button button2 add_edit'>Edit</button><button class='button button3 add_delete'>Delete</button></td>
			</tr>"
		;
	 }
	 	 
     echo "</table>";
}

mysqli_close($db);
?>
</div>
<form name= "new_add" method="post" action="new_add.html">
<button class="button button4" style="font-size:12px">New Add</button>
</form>
</div>

<script>
$(".message_add_view").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var id = $row.find(".id").text(); // Find the text
    
    //alert(id);//for the test
	$.ajax({
    data: 'orderid=' + id,
    url: 'add_page_view.php',
    method: 'POST',
    success: function(msg) {
		//alert(id);
		window.location.replace('add_page_view.php?orderid='+id);
		//document.write(msg);
        //var newWindow = window.open("", "new window", "width=100%, height=100%");
       //write the data to the document of the newWindow
       //newWindow.document.write(msg);
		}
	});
});
$(".add_edit").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var id = $row.find(".add_id").text(); // Find the text
    
    //alert(id);//for the test
	$.ajax({
    data: 'orderid=' + id,
    url: 'edit_add.php',
    method: 'POST',
    success: function(msg) {
		//alert(id);
		window.location.replace('edit_add.php?orderid='+id);
		//document.write(msg);
        //var newWindow = window.open("", "new window", "width=100%, height=100%");
       //write the data to the document of the newWindow
       //newWindow.document.write(msg);
		}
	});
});
$(".add_delete").click(function() {
	if (confirm("Are you sure to delete this ad?") == true) {
    var $row = $(this).closest("tr");    // Find the row
    var id = $row.find(".add_id").text(); // Find the text
    
    //alert(id);//for the test
	$.ajax({
    data: 'orderid=' + id,
    url: 'add_delete.php',
    method: 'POST',
    success: function(msg) {
		//alert(id);
		document.body.innerHTML = '';
		document.write(msg);
        //var newWindow = window.open("", "new window", "width=100%, height=100%");
       //write the data to the document of the newWindow
       //newWindow.document.write(msg);
		}
	});
	}
});
$(".add_viewers").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var id = $row.find(".add_id").text(); // Find the text
	
    //alert(id);//for the test
	$.ajax({
    data: 'orderid=' + id,
    url: 'viewers.php',
    method: 'POST',
    success: function(msg) {
		alert(msg);
		//document.write(msg);
        //var newWindow = window.open("", "new window", "width=100%, height=100%");
       //write the data to the document of the newWindow
       //newWindow.document.write(msg);
		}
	});
});
</script>

</body>
</html>
