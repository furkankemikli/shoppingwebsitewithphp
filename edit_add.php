<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<html>
<style>
/* Full-width input fields */
* {	
    background-color: #F7D358;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
}

.header {
	padding: 15px;
    horizontal allignment: center;
    border: 1px solid gray;
    border-radius:6px;     
    background-color: #FE642E;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.submitbtn {
    float: left;
    width: 100%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
    margin-top: 2px;
    border: 1px solid gray;
    border-radius:6px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}

.button1 {
		  border-radius: 12px;

</style>
<body>

<div class="header">
  <form style="display: inline; background-color: #FE642E" name= "new_add_back" method="post" action="person_page.php">
  <button class="button button1" style="font-size:12px"><i class="fa fa-angle-left"></i> BACK</button>
  </form>
  <form style="display: inline; background-color: #FE642E" name= "new_add_logout" method="post" action="main_page_login.php">
 <button class="button button1" style="background-color: #ff0000; float: right;font-size:12px"><i class="fa fa-angle-left"></i> LOG OUT</button>
  </form>
  <h1 align="center" style="background-color: #FE642E">SHOPNOW MARKET</h1>
</div>

<h2 align="center">Edit Add</h2>

<form action="add_edit_update.php" style="border:1px solid #ccc">
  <div class="container">
  <?php
  include('session.php');

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'shopnow';

	$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

	$id = $_GET['orderid'];
//add owner will be get from session
$sql = "SELECT * FROM adds WHERE id = '$id'";
$mysqli_result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($mysqli_result);
  
    echo'<div align="center">
					<img src="data:image/jpeg;base64,' .base64_encode($row['image']).'" style="width:50%">
		 </div>
				  
    <label><b>Title</b></label>
    <input id="title" style="background-color: #FAFAFA" type="text" placeholder="Enter Title" name="title" value="'.$row['title']. '" required>
    <br>
    <label><b>Description</b></label>
    <input id="description" style="background-color: #FAFAFA" type="text" placeholder="Enter Description" name="description" value="'.$row['description']. '" required>
    <br>
    <label style="margin-top: 7px;"><b>Category</b></label><br>
    <select id="category" name="category" style="margin-top: 7px; margin-bottom: 7px; background-color: #FAFAFA">
  	<option style="background-color: #FAFAFA" value="sports"';if($row['category'] == 'sports'){echo 'selected';}echo'>Sports</option>
  	<option style="background-color: #FAFAFA" value="hobby"';if($row['category'] == 'hobby'){echo 'selected';}echo'>Hobby</option>
  	<option style="background-color: #FAFAFA" value="clothes"';if($row['category'] == 'clothes'){echo 'selected';}echo'>Clothes</option>
  	<option style="background-color: #FAFAFA" value="electronic"';if($row['category'] == 'electronic'){echo 'selected';}echo'>Electronic</option>
	</select>
	<br>
    <label><b>Price</b></label><br>
    <input id="price" style="margin-top: 7px;background-color: #FAFAFA" type="number" step="0.01" name="price" value='.$row['price'].' required>
	<input hidden id="orderid" style="margin-top: 7px;background-color: #FAFAFA" type="number" step="0.01" name="orderid" value='.$_GET['orderid'].' >
	<div class="clearfix">
      <button type="submit" class="submitbtn use-address">Submit</button>
    </div>
    
  </div>
</form>
'
?>
<script>

function showImage(src,target) {
  var fr=new FileReader();
  // when image is loaded, set the src of the image where you want to display it
  fr.onload = function(e) { target.src = this.result; };
  src.addEventListener("change",function() {
    // fill fr with image data    
    fr.readAsDataURL(src.files[0]);
  });
}
var src = document.getElementById("src");
var target = document.getElementById("target");
showImage(src,target);

$(".use-address").click(function() {
    var title = document.getElementById("title").value;
	var description = document.getElementById("description").value;
	var category = document.getElementById("category").value;
	var price = document.getElementById("price").value;
	var orderid = document.getElementById("orderid").value;
    //alert(orderid);//for the test
	$.ajax({
    data: 'orderid=' + orderid + '&title=' + title + '&description=' + description + '&price=' + price + '&category=' + category,
    url: 'add_edit_update.php',
    method: 'GET',
    success: function(msg) {
		//alert(id);
		document.write(msg);
        //var newWindow = window.open("", "new window", "width=100%, height=100%");
       //write the data to the document of the newWindow
       //newWindow.document.write(msg);
		}
	});
});

</script>

</body>
</html>
